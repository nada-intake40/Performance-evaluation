<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UpdatingUserService
{
    protected $repo;
    //protected $service;

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
     * update user service
     *
     * @param string $password
     * @return array
     */
    public function execute(User $user, array $request)
    {

        $this->repo->setModel($user);

        $role = Role::find($request['role_id']);
        if(!$user->hasRole($role)){
            $oldRole = DB::table('model_has_roles')->where('model_id',$user->id)
            ->update(['role_id' =>  $request['role_id']]);

        }
        if($request['group_id']){
            foreach($request['group_id'] as $element){
                $existing_groups = DB::table('groups_users')->where(['group_id'=>$element,'user_id'=>$user->id])->exists();
                if(!$existing_groups){
                  DB::insert('insert into groups_users (group_id, user_id) values (?, ?)',
                  [$element, $user->id]);
                }
              }
            $groups_id = DB::table('groups_users')->where('user_id',$user->id)->pluck('group_id');
            $groups_arr= json_decode(json_encode($groups_id), true); 
            $different_groups = array_diff($groups_arr,$request['group_id']);
            foreach($different_groups as $ele){
                DB::table('groups_users')->where(['group_id'=>$ele,'user_id'=>$user->id])->delete();
            }
        }
        return $this->repo->updateExistingModel($request);
        
    }

}
       

       



