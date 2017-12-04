<?php
/**
 * Copyright (c) 2017.
 * *
 *  * Created by PhpStorm.
 *  * User: Edo
 *  * Date: 10/3/2016
 *  * Time: 10:44 PM
 *
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//Routes
Route::get('/', 'IndexConroller@getIndex');
Route::get('/posts', 'IndexConroller@getPosts');
Route::get('/new-post', 'IndexConroller@getNewPost');
Route::post('/new-post', 'IndexConroller@postNewPost');
Route::get('/settings', 'IndexConroller@getSettings');
Route::group(['prefix'=>'form-bulder'],function (){
    Route::get('/', 'IndexConroller@getFormBulder');
    Route::post('/form-fields', 'IndexConroller@postFormFieldsSettings');
});
Route::post('/settings', 'IndexConroller@postSettings');
Route::post('/render-unit', 'IndexConroller@unitRenderWithFields');