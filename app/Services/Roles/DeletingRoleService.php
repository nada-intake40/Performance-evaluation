<?php

namespace App\Services\Roles;

use App\Repositories\RoleRepository;
use  Spatie\Permission\Models\Role;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingRoleService
{
    protected $repo;

    /**
     * Creating RoleService instance
     *
     * @param rolepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Delete  role service
     *
     * @return array
     */
    public function execute(Role $role) : bool
    {

        $this->repo->setModel($role);
        return $this->repo->deleteExistingModel();

    }
}
