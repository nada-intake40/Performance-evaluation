<?php

namespace App\Services\Roles;

use App\Repositories\RoleRepository;

class RetrievingAllRolesService
{
    protected $repo;

    /**
     * Creating roleService instance
     *
     * @param rolepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving all roles service
     *
     * @return array
     */
    public function execute()
    {

        if (!$this->repo->getAll()->isEmpty()&&$this->repo->count()>0) {
            return $this->repo->getAll();
        } else {
            return response()->json([
                "message" => "Roles not found"
            ], 404);
        }

    }
}
