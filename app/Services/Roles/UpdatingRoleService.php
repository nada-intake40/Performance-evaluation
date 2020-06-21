<?php

namespace App\Services\Roles;
use Illuminate\Http\Request;

use App\Repositories\RoleRepository;
use  Spatie\Permission\Models\Role;
use  Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

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
    public function execute($id, array $request)
    {
        $data = $request;
        $nameData = $request['name'];
        if($this->repo->getById($id)!=null){
            $this->repo->getById($id)->update(['name'=>$nameData]);
            $permission = Permission::find($id)->update(['name'=>$nameData]);
            foreach($data['permissions'] as $element){
              $old_permission = DB::table('role_has_permissions')->where(['permission_id'=>$id,'role_id'=>$element])->exists();
              if(!$old_permission){
                DB::insert('insert into role_has_permissions (permission_id, role_id) values (?, ?)',
                [$id, $element]);
              }
            }
            $roles_id = DB::table('role_has_permissions')->where('permission_id',$id)->pluck('role_id');
            $roles_grp= json_decode(json_encode($roles_id), true); 
            $different_roles = array_diff($roles_grp,$data['permissions']);
            foreach($different_roles as $ele){
                DB::table('role_has_permissions')->where(['permission_id'=>$id,'role_id'=>$ele])->delete();
            }
            return  response()->json($data);
        }
        else {
            return response()->json([
                "message" => "criteria can not update"
            ], 404);
        }

        return false;



    }







}
