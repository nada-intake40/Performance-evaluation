<?php

namespace App\Services\Roles;
use Illuminate\Http\Request;

use App\Repositories\RoleRepository;
use  Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;



class  StoringRoleService
{
    protected $repo;
    //protected $service;

    /**
     * Creating RoleService instance
     *
     * @param roleepository $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * soring  role service
     *
     *
     * @return array
     */
    public function execute(array $request)
    {


        $role = $this->repo->create(['name'=>$request['name'], 'guard_name'=>'web']);
        if($role){
            $permission = Permission::create(['name'=>$role->name,'guard_name'=>'web']);
            if($permission){
                if($request['permissions']){
                    foreach($request['permissions'] as $element){                  
                        DB::insert('insert into role_has_permissions (permission_id, role_id) values (?, ?)',
                         [$permission->id, $element]);
                    }
                }

            }
            return  response()->json($role);
        }
        return false;

    }


}
