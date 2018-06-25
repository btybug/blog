<?php

Route::group(['prefix'=>'comments'],function (){
    Route::post('/create', 'CommentsConroller@postCreate')->name('comment_create_post');
});