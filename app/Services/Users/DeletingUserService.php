<?php

namespace App\Services\Users;

use App\Models\User ;
use App\Repositories\UserRepository;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingUserService
{
    protected $repo;

    /**
     * Creating UserService instance
     *
     * @param Userepository $repo
     */
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Delete  user service
     *
     * @return array
     */
    public function execute(User $user) : bool
    {
        $this->repo->setModel($user);
        return $this->repo->deleteExistingModel();

    }
}
