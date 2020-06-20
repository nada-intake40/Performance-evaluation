<?php

namespace App\Services\Users;

use App\Repositories\UserRepository;
use  Spatie\Permission\Models\Role;
use App\Models\User;


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
    public function execute($role,$id)
    {
        if ($role == 'Manager' || $role == 'Senior Developer'){
            $users = $this->repo->getBySupervisorId($id);
            return $users;
        }
        elseif ($role == 'ProductOwner') {
            $users = $this->repo->getUsersByRole(['Junior Developer' ,'Tester']);
            return $users;

        }
        elseif ($role == 'Junior Developer' || $role == 'Tester') {
            $users =[];
            $pos = $this->repo->getUsersByRole(['ProductOwner']);
            $user = $this->repo->getById($id);
            $supervisor = $this->repo->getById($user->supervisor);
            $team = $this->repo->getBySupervisorId($user->supervisor);
            array_push($users,$pos,$supervisor,$team);
            return $users;

        }
        elseif ($role == 'Admin' || $role == 'superadmin'){
            $users = $this->repo->getAll();
            return $users;
        }
        elseif ($role == 'DevOps'){
            $users = User::role($role)->get(); 
            return $users;
        }
            
         else {
            return response()->json([
                "message" => "Users not found"
            ], 404);
        }
       

    }
    

}
