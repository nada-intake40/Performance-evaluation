<?php

namespace App\Services\Groups;

use App\Repositories\GroupRepository;

class RetrivingAllGroupsService
{
    protected $repo;

    /**
     * Creating indicatorService instance
     *
     * @param grouprepository $repo
     */
    public function __construct(GroupRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving all groups service
     *
     * @return array
     */
    public function execute()
    {
        return $this->repo->getAll();
    }
}
