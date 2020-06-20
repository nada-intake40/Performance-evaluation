<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;

class RetriveTrashedUsersService
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
      
        if ((!$this->repo->getTrash()->isEmpty())) {
            return $this->repo->getTrash();
        } else {
            return response()->json([
                "message" => "Empty Content"
            ], 204);
        }
     

        }
}
