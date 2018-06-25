<?php

namespace BtyBugHook\Blog\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $table = 'comments';

    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo('BtyBugHook\Blog\Models\Post', 'post_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('BtyBugHook\Blog\Models\Comment', 'parent_id', 'id')->where('status','approved');
    }

    public function parent()
    {
        return $this->belongsTo('BtyBugHook\Blog\Models\Comment', 'parent_id', 'id');
    }

    public function childrenAll()
    {
        return $this->hasMany('BtyBugHook\Blog\Models\Comment', 'parent_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo('Btybug\User\User', 'author_id', 'id');
    }
}
