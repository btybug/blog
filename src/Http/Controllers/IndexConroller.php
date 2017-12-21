<?php

namespace BtyBugHook\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\Console\Models\Forms;
use Btybug\Console\Repository\FieldsRepository;
use Btybug\Console\Repository\FormsRepository;
use Btybug\Console\Services\FieldService;
use Btybug\Console\Services\FormService;
use Btybug\User\Repository\RoleRepository;
use Illuminate\Http\Request;
use Btybug\btybug\Models\Templates\Units;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\btybug\Models\Migrations;
use Btybug\btybug\Repositories\AdminsettingRepository;
use BtyBugHook\Blog\Http\Requests\CreatePostRequest;
use BtyBugHook\Blog\Http\Requests\PostSettingsRequest;
use BtyBugHook\Blog\Repository\PostsRepository;
use BtyBugHook\Blog\Services\PostsService;

class IndexConroller extends Controller
{
    public function getIndex()
    {

        return view('blog::index');
    }

    public function getPosts(
        PostsRepository $postsRepository
    )
    {
        $posts = $postsRepository->getAll();

        return view('blog::list', compact(['posts']));
    }

    public function getNewPost()
    {
        return view('blog::create');
    }

    public function postNewPost(
        CreatePostRequest $request,
        PostsService $postsService
    )
    {
        $result = $postsService->create($request->except("_token", 'image'), $request->file("image"));

        return redirect()->to('admin/blog/posts')->with("message", "Post Successfully Created");
    }

    public function getSettings(
        FrontPagesRepository $pagesRepository,
        FormsRepository $formsRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $table = 'posts';
        $all = $pagesRepository->findBy('slug', 'all-posts');
        $single = $pagesRepository->findBy('slug', 'single-post');
        $createForms = $formsRepository->getFormsByFieldType($table,['*'],true,'new');
        $editForms = $formsRepository->getFormsByFieldType($table,['*'],true,'edit');
        $columns = \DB::select('SHOW COLUMNS FROM ' . $table);
        $this->data['default'] = ['NULL', 'USER_DEFINED', 'CURRENT_TIMESTAMP'];
        $this->data['tbtypes'] = Migrations::types();
        $this->data['engine'] = Migrations::engine();
        $this->data['table'] = $table;
        $this->data['columns'] = $columns;
        foreach ($columns as $column) {
            $after_columns[$column->Field] = $column->Field;
        }
        $this->data['after_columns'] = $after_columns;
        $settings = $adminsettingRepository->findOneByMultipleSettingsArray(['section' => 'btybug_blog','settingkey' => 'blog_settings']);
        return view('blog::settings', compact(['all', 'single','createForms','editForms','settings']))->with($this->data);
    }

    public function getFormBulder()
    {
        $form = null;
        //$data['form_fields'] = ($settings) ? json_decode($settings->value,true) : [];
        return view("blog::form_bulder",compact('form'));
    }

    public function getEditFormBulder(
        $id,
        FormsRepository $formsRepository,
        FormService $formService
    )
    {
        $form = $formsRepository->findOrFail($id);

        $fields = json_encode([10,11]);
        $html = $formService->render($id);
        return view("blog::form_bulder",compact('form','fields','html'));
    }

    public function postFormBulder(
        Request $request,
        FormService $service
    )
    {
        $service->createOrUpdate($request->except('_token'));

        return redirect()->to('admin/blog/form-list')->with('message','Form successfully Saved');
    }

    public function getList(
        FormsRepository $formsRepository
    )
    {
        $pluginForms = $formsRepository->getFormsByFieldType('posts',['core','plugin']);
        $forms = $formsRepository->getFormsByFieldType('posts',['custom']);
        return view("blog::form-list",compact('pluginForms','forms'));
    }


    public function postSettings(
        Request $request,
        FrontPagesRepository $pagesRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $adminsettingRepository->createOrUpdate(json_encode($request->only('posts_create_form','posts_edit_form','url_manager'),true), 'btybug_blog', 'blog_settings');
//        $pagesRepository->update($request->id, $request->except('id', '_token'));

        return redirect()->back();
    }

    public function unitRenderWithFields(
        Request $request,
        AdminsettingRepository $adminsettingRepository,
        FieldsRepository $fieldsRepository,
        FieldService $fieldService
    )
    {
        $fields = $request->get('fields',null);
        $data = [];
        $existing = [];
        if($fields){
            foreach ($fields as $k => $v){
                $f = $fieldsRepository->find($k);
                if($f) {
                    $data[$f->id]['object'] = $f;
                    $data[$f->id]['html'] = $fieldService->returnHtml($f);
                    $data[$f->id]['field_data'] = get_field_data($f->id);
                    $existing[$k] = $k;
                }
            }

            return \Response::json(['error' => false,'fields' => $data]);
        }
        return \Response::json(['message' => "Fields are invalid",'error' => true]);
    }

    public function postFormFieldsSettings(Request $request, AdminsettingRepository $adminsettingRepository)
    {
        $data = $request->except('_token');
        $adminsettingRepository->createOrUpdate(json_encode($data,true), 'btybug_blog', 'form_field_settings');
        return redirect()->back();
    }

    public function getEditPost(
        $id,
        PostsRepository $postsRepository
    )
    {
        $post = $postsRepository->findOrFail($id);

        return view('blog::edit',compact('post'));
    }

    public function postEditPos(
        $id,
        Request $request,
        PostsService $postsService
    )
    {
        $result = $postsService->update($request->except("_token", 'image'), $request->file("image"));

        return redirect()->to('admin/blog/posts')->with("message", "Post Successfully Edited");
    }

    public function getFieldsByTable(
        Request $request,
        FieldsRepository $fieldsRepository
    )
    {
        $fields = $fieldsRepository->getWhereNotExists($request->table,$request->fields);
        $html = \View("blog::_partials.field-list",compact('fields'))->render();

        return \Response::json(['html' => $html]);
    }

    public function getFormSettings (
        $id,
        RoleRepository $roleRepository,
        FormsRepository $formsRepository
    )
    {
        $form = $formsRepository->findOrFail($id);
        $roles = $roleRepository->getAllWithGuest();
        return view('blog::forms.settings',compact('roles','form'));
    }

    public function postFormSettings(
        $id,
        Request $request,
        FormsRepository $formsRepository
    )
    {
        $form = $formsRepository->findOrFail($id);
        $formsRepository->update($id,['settings' => $request->except('_token')]);

        return redirect()->back()->with('message','Form settings are saved');
    }

    public function getMyFormsView (
        $id,
        FormsRepository $formsRepository,
        FormService $formService
    )
    {
        $form = $formsRepository->findOneByMultiple(['id' => $id,'created_by' => 'plugin']);
        if( ! $form) abort(404,"Form not found");

        return view('blog::forms.view',compact('form'));
    }
}