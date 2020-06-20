<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoringUser;
use App\Http\Requests\UpdatingUserRequest;
use Illuminate\Http\Response;
use App\Http\Resources\User as ResourcesUser;
use App\Services\Evaluation_Cycles\RetrievingAllEvaluation_CyclesService;
use App\Services\Users\RetrievingAllUsersService;
use App\Services\Users\RetrievingUserService;
use App\Services\Users\DeletingUserService;
use App\Services\Users\StoringUserService;
use App\Services\Users\UpdatingUserService;
use App\Services\Users\RetrivingUsersBySupervisorService;
use App\Services\Users\RetriveTrashedUsersService;
use App\Services\Users\RestoreTrashedUserService;



class UserController extends Controller
{
    public function index( RetrievingAllUsersService $service, Request $request)
    {


        $output= $service->execute();
           return  ResourcesUser::collection($output);
    }

    public function show(User $user)
    {
    
        $role= $user->roles()->pluck('id')->first();
        $user['role'] = $role ;
        return $user ;
    
    }

    public function destroy( User $user, DeletingUserService $service)
    {
        return $service->execute($user);

    }

    public function store(StoringUser $request , StoringUserService $service)
    {


        return $service->execute($request->validated());

    }
    public function update(User $user,UpdatingUserRequest $request , UpdatingUserService $service)
    {
        return $service->execute($user,$request->validated());

    }
    public function getUsers($role, $id, RetrivingUsersBySupervisorService $service)
    {
        return $service->execute($role, $id);

    }
    public function trash(RetriveTrashedUsersService $service){
        $output= $service->execute();
        return  ResourcesUser::collection($output);
        // return $service->execute();

    }
    public function restore( $id , RestoreTrashedUserService $service){
        
        return $service->execute($id);

    }


}
