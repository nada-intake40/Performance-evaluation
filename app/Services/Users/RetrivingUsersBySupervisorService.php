<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use  Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use  Spatie\Permission\Models\Permission;



class RetrivingUsersBySupervisorService
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
     * retrieving  users service for specific supervisor
     *
     * @return array
     */
    public function execute($role, $user_id)
    { 
        
        $permission = Permission::where('name',$role)->first();
        $roles = DB::table('role_has_permissions')->where('permission_id',$permission->id)->get();
        $roles_grp= json_decode(json_encode($roles), true); 
        $user_group = DB::table('groups_users')->where('user_id',$user_id)->pluck('group_id');
        $user_groups= json_decode(json_encode($user_group), true); 
        $users = $this->repo->getUsersByRole($roles_grp,$user_groups);
        if($users){
            return $users;
        }
            
         else {
            return response()->json([
                "message" => "Users not found"
            ], 404);
        }
       

    }
    

}
