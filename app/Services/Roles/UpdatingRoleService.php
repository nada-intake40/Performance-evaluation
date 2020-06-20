<?php

namespace App\Services\Roles;
use Illuminate\Http\Request;

use App\Repositories\RoleRepository;
use  Spatie\Permission\Models\Role;

class UpdatingRoleService
{
    protected $repo;
    //protected $service;

    /**
     * Creating roleService instance
     *
     * @param roleepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * update user service
     *

     * @return array
     */
    public function execute(Role $role, array $request)
    {

        $this->repo->setModel($role);
        return $this->repo->updateExistingModel($request);



    }







}
