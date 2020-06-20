<?php

namespace App\Services\Users;
use Illuminate\Http\Request;
use App\Abstracts\AbstractRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Http\Requests\StoringUser;
use GuzzleHttp\Psr7\UploadedFile;
use Spatie\Permission\Models\Role;


class StoringUserService
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
     * soring  user service
     *
     * @param string $password
     * @return array
     */
    public function execute(array $request)
    {
        if($request['avatar']){
            $file = $request['avatar'];
            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $request['avatar']=$name;
        }

        $user = $this->repo->create($request);
        if($user){
            $role= Role::find($request['role_id']);
            $user->assignRole($role);
            return  response()->json($user);
        }
        return false;

    }


}
