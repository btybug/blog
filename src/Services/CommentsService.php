<?php

namespace BtyBugHook\Blog\Services;

use Btybug\btybug\Repositories\AdminsettingRepository;
use Btybug\btybug\Services\GeneralService;
use BtyBugHook\Blog\Repository\CommentsRepository;
use BtyBugHook\Blog\Repository\PostsRepository;

class CommentsService extends GeneralService
{
    private $result;
    private $postRepo;
    private $commentRepository;
    private $adminsettingsRepository;

    public function __construct(
        PostsRepository $postsRepository,
        CommentsRepository $commentsRepository,
        AdminsettingRepository $adminsettingRepository
    )
    {
        $this->postRepo = $postsRepository;
        $this->commentRepository = $commentsRepository;
        $this->adminsettingsRepository = $adminsettingRepository;
    }

    public function create(array $data)
    {
        $data = $this->addDefaultData($data);
        $this->commentRepository->create($data);
    }

    public function addDefaultData($data)
    {
        $settings = $this->adminsettingsRepository->getSettings('comments', 'settings',true);
        $data['status'] = issetReturn($settings,'status','unpublished');
        return $data;
    }


    public function delete($id)
    {
        $this->commentRepository->findOrFail($id);
        $this->commentRepository->delete($id);
    }

}