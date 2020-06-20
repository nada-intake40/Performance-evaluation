<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;

class RestoreTrashedUserService
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
    public function execute($id)
    {
      
        if($this->repo->restoreTrash($id) != null&&$this->repo->count()>0){
            return response()->json([
            "message" => "criteria restored"
            ]);
        }
        else
        {
            return response()->json([
                "message" => "criteria not found"
            ], 404);
        }

    }
}
