<?php
namespace BtyBugHook\Blog\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use BtyBugHook\Blog\Models\Comment;

class CommentsRepository extends GeneralRepository
{
    public function model()
    {
        return new Comment();
    }
}