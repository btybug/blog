<?php

namespace BtyBugHook\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Universal\Paginator;
use Btybug\Console\Models\Forms;
use Btybug\Console\Repository\FieldsRepository;
use Btybug\Console\Repository\FormsRepository;
use Btybug\Console\Services\FieldService;
use Btybug\Console\Services\FormService;
use Btybug\User\Repository\RoleRepository;
use BtyBugHook\Blog\Models\Post;
use BtyBugHook\Blog\Repository\CommentsRepository;
use BtyBugHook\Blog\Services\CommentsService;
use Illuminate\Http\Request;
use Btybug\btybug\Models\Templates\Units;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\btybug\Models\Migrations;
use Btybug\btybug\Repositories\AdminsettingRepository;
use BtyBugHook\Blog\Http\Requests\CreatePostRequest;
use BtyBugHook\Blog\Http\Requests\PostSettingsRequest;
use BtyBugHook\Blog\Repository\PostsRepository;
use BtyBugHook\Blog\Services\PostsService;
use Yajra\DataTables\DataTables;

class CommentsConroller extends Controller
{
    public $commentService;
    public $commentRepository;
    public $adminsettingsRepository;

    public function __construct(
        CommentsService $commentsService,
        CommentsRepository $commentsRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $this->commentService = $commentsService;
        $this->commentRepository = $commentsRepository;
        $this->adminsettingsRepository = $adminsettingRepository;
    }
    public function getIndex()
    {
        $comments = $this->commentRepository->getAll();
        return view('blog::comments.index',compact(['comments']));
    }

    public function getSettings()
    {
        $data = $this->adminsettingsRepository->getSettings('comments', 'settings',true);

        return view('blog::comments.settings',compact(['data']));
    }

    public function postSettings(
        Request $request
    )
    {
        $this->adminsettingsRepository->createOrUpdateToJson($request->except('_token'), 'comments', 'settings');
        return redirect()->back();
    }

    public function postCreate(
        Request $request
    )
    {
        $this->commentService->create($request->except('_token'));

        return redirect()->back()->with("message", "Comment Successfully Created, will be approved soon");
    }

    public function unapprove($id)
    {
        $this->commentRepository->findOrFail($id);
        $this->commentRepository->update($id,['status'=>'unapprove']);

        return redirect()->back()->with("message", "Comment Successfully unapproved");
    }

    public function approve($id)
    {
        $this->commentRepository->findOrFail($id);
        $this->commentRepository->update($id,['status'=>'approved']);

        return redirect()->back()->with("message", "Comment Successfully approved");
    }

    public function delete($id)
    {
        $this->commentRepository->findOrFail($id);

        $this->commentRepository->delete($id);

        return redirect()->back()->with("message", "Comment Successfully deleted");
    }

    public function postsData()
    {
        set_time_limit(-1);
        ini_set('memory_limit', '2048M');
        return DataTables::of($this->commentRepository->model()->query())->addColumn('actions', function ($comment) {
            $delete = url("admin/blog/comments/delete",$comment->id);
            $approve = url("admin/blog/comments/approve",$comment->id);
            $unapprove = url("admin/blog/comments/unapprove",$comment->id);

            $str = "<a href='$delete' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
            if($comment->status == 'approved') {
                $str.= "<a href='$unapprove' class='btn btn-info'>Block</a>";
            }else{
                $str.= "<a href='$approve' class='btn btn-primary'>Approve</a>";
            }

            return $str;
        },2)->addColumn('author_id', function ($comment) {
            if($comment->author){
                return $comment->author->username;
            }else{
                return $comment->guest_name . " ( GUEST ) ";
            }
        })->editColumn('post_id', function ($comment) {
            return $comment->post->title;
        })->editColumn('parent_id', function ($comment) {
            if($comment->parent_id){
                return $comment->parent_id;
            }else{
                return " No Parent ";
            }
        })->rawColumns(['actions'])->make(true);
    }
}