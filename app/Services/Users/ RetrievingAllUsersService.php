<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;

class RetrievingAllUsersService
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
     * retrieving all users service
     *
     * @return array
     */
    public function execute()
    {
        if (!$this->repo->getAll()->isEmpty()&&$this->repo->count()>0) {
            return $this->repo->getAll();
        } else {
            return response()->json([
                "message" => "Users not found"
            ], 404);
        }

    }
}
