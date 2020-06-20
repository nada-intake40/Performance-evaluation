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
    public function execute($role)
    {
        $permission = Permission::where('name',$role);
         $roles = DB::table('role_has_permissions')::where('permission_id',$permission->id)->get();
         $users = $this->repo->getUsersByRole($roles);
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
