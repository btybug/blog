<?php

namespace BtyBugHook\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\Console\Repository\FieldsRepository;
use BtyBugHook\Blog\Services\ReplaceAtor;
use Illuminate\Http\Request;

class MyFormController extends Controller
{
    public function postRenderField(
        Request $request,
        FieldsRepository $fieldsRepository
    )
    {
        $field = $fieldsRepository->findByTableAndCol($request->table, $request->field);

        if ($field && view()->exists("blog::_partials.custom_fields." . $field->type)) {
            $html = \view("blog::_partials.custom_fields." . $field->type)->with('field', $field->toArray())->render();
            return ['error' => false, 'html' => $html];
        }
        return ['error' => true];
    }

    public function postSaverForm(
        Request $request,
        FieldsRepository $fieldsRepository
    )
    {
        $id = $request->get('id');
        $fields = $request->get('fields');
        $html = "{{--Form $id --}}\r\n" . \File::get(plugins_path('vendor/btybug.hook/blog/src/views/_partials/custom_fields/fheader.blade.php')) . "\r\n";
        foreach ($fields as $field) {
            $field = $fieldsRepository->findByTableAndCol('posts', $field);
            $path = plugins_path('vendor/btybug.hook/blog/src/views/_partials/custom_fields/' . $field->type . '.blade.php');
            if (\File::exists($path)) {
                $blade = \File::get($path) . "\r\n";
                $html .= ReplaceAtor::replace($blade, $field);
            }
        }
        $html .= \File::get(plugins_path('vendor/btybug.hook/blog/src/views/_partials/custom_fields/ffooter.blade.php')) . "\r\n";
        $storagePath = "Forms/$id.blade.php";
        //TODO:: $html esi htmlna Edo
//        \File::put(storage_path($storagePath), $html);
        return ['error' => true];
    }
}