<?php

namespace BtyBugHook\Blog\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany('BtyBugHook\Blog\Models\Comment', 'post_id', 'id');
    }
}
