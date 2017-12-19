<?php

namespace BtyBugHook\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\Console\Repository\FieldsRepository;
use Illuminate\Http\Request;

class MyFormController extends Controller
{
    public function postRenderField(
        Request $request,
        FieldsRepository $fieldsRepository
    )
    {
        $field = $fieldsRepository->findByTableAndCol($request->table,$request->field);

        if($field){
            $html = \view("blog::_partials.custom_fields.".$field->type)->with('field',$field->toArray())->render();

            return ['error' => false,'html' => $html];
        }
        return ['error' => true];
    }
}