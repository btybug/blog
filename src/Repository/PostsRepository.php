<?php
namespace BtyBugHook\Blog\Repository;

use Btybug\btybug\Models\Universal\Paginator;
use Btybug\btybug\Repositories\GeneralRepository;
use BtyBugHook\Blog\Models\Post;

class PostsRepository extends GeneralRepository
{
    /**
     * @return mixed
     */
    public function getGroupedWithAuthor($id)
    {
        return $this->model->where('author_id', $id)->get();
    }

    public function getPublished()
    {
        return $this->model->where('status', 'published')->orWhere('status',1)->get();
    }

    public function paginationSettings($settings){
        $pagination_type = isset($settings["custom_pagination"]) ? $settings["custom_pagination"] : null;
        $limit_per_page = $settings["custom_limit_per_page"] ? $settings["custom_limit_per_page"] : 10;

        $posts = $this->getPublished();

        if ($pagination_type){
            $posts = new Paginator($limit_per_page,6,'bty-pagination-2',$posts);
        }
        return $posts;
    }

    public function getPublishedByUrl($slug)
    {
        return $this->model->where('status', 'published')->where('slug',$slug)->first();
    }

    public function renderSearch($term,$search_by = null){
        $result = $this->model->where('status','published');
        if(count($search_by)){
            foreach ($search_by as $key => $column){
                if($key === 0){
                    $result = $result->where($column,'like','%'.$term.'%');
                }else{
                    $result = $result->orWhere($column,'like','%'.$term.'%');
                }
            }
        }else{
            $result = $result->where('title','like','%'.$term.'%');
        }
        return $result;
    }

    public function renderSort($all_posts,$sort_by='id',$sort_how='ASC'){

        $result = $all_posts->orderBy($sort_by,$sort_how);

        return $result;
    }

    public function getRelatedPosts($autorID)
    {
        return $this->model->where('status', 'published')->where('author_id',$autorID)->take(3)->get();
    }

    public function getPreviousPost($postID)
    {
        return $this->model->where('status', 'published')->where('id', '<', $postID)->first();
    }

    public function getNextPost($postID)
    {
        return $this->model->where('status', 'published')->where('id', '>', $postID)->first();
    }

    public function getAllByCount($count = 4)
    {
        return $this->model->where('status', 'published')->orderBy('created_at','desc')->take(4)->get();
    }

    public function model()
    {
        return new Post();
    }
}