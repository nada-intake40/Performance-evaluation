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


        $role = $this->repo->create(['name'=>$request['name'] ]);
        // $role = 12;
        if($role){
            $permission = Permission::create(['name'=>$role->name]);
            if($permission){
                if($request['permissions']){
                    // return gettype($request['permissions']);
                    foreach($request['permissions'] as $element){
                        // DB::table('role_has_permissions')
                        // ->create(['permission_id'=>$permission->id,'role_id'=>$element]);
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
