<?php
addProvider('BtyBugHook\Blog\Providers\ModuleServiceProvider');

function get_field_attr($id,$attr = null){
    $fieldRepository = new \Btybug\Console\Repository\FieldsRepository();

    $field = $fieldRepository->find($id);
    if($field && ! $attr){
        return $field;
    }elseif ($field && $attr && isset($field->$attr)){
        return $field->$attr;
    }

    return null;
}


