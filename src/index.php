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


function get_active_form($form_type = "posts_create_form"){
    $adminsettingRepository =  new \Btybug\btybug\Repositories\AdminsettingRepository();
    $settings = $adminsettingRepository->findOneByMultipleSettingsArray(['section' => 'btybug_blog','settingkey' => 'blog_settings']);

    return (isset($settings[$form_type])) ? $settings[$form_type] : null;
}