<?php
/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace BtyBugHook\Blog\Services;

use Btybug\btybug\Services\GeneralService;
use BtyBugHook\Blog\Repository\PostsRepository;

class PostsService extends GeneralService
{
    private $result;
    private $postRepo;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postRepo = $postsRepository;
    }


    public function create(array $data)
    {
        $data['author_id'] = \Auth::id();
        $data['slug'] = self::replaceSpaceWithLine($data['title']);
        $created = $this->postRepo->create($data);
    }

    public function update(array $data)
    {
        $updated = $this->postRepo->update($data['id'],$data);
    }

    public function upload($file, $postId)
    {
        $path = \Storage::disk('public')->put('posts', $file);

        $this->postRepo->update($postId,['image' => $path]);
    }

    public function delete($id)
    {
        $plan = $this->postRepo->find($id);
        unlink(public_path($plan->icon));
        $this->postRepo->delete($id);
    }

    public static function replaceSpaceWithLine($string)
    {
        return str_replace(" ","-",$string);
    }

    public static function getPostByUrl()
    {
        $param = \Request::route()->parameters();
        if(isset($param['param'])){
            $slug = $param['param'];
            $repo = new PostsRepository();
            $post = $repo->getPublishedByUrl($slug);
            return $post;
        }

        return null;
    }

    public static function getPostById($id)
    {
        $repo = new PostsRepository();
        $post = $repo->find($id);
        return $post;
    }

    public static function getPostsByPluck()
    {
        $repo = new PostsRepository();
        $post = $repo->pluck("title","id");
        if(count($post)) return $post->toArray();

        return [];
    }
}