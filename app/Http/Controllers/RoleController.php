<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoringRoleRequest;
use Illuminate\Http\Request;
use App\Services\Roles\RetrievingAllRolesService;
use App\Services\Roles\RetrievingRoleService;
use App\Services\Roles\DeletingRoleService;
use App\Services\Roles\StoringRoleService;
use App\Services\Roles\UpdatingRoleService;
use  Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function index(RetrievingAllRolesService $service, Request $request)
    {

        // $posts=User::paginate(10);
        // return  ResourcesUser::collection($posts);

           return  $service->execute();
    }

    public function store(StoringRoleRequest $request , StoringRoleService $service)
    {
        return $service->execute($request->validated());

    }
    public function destroy( Role $role, DeletingRoleService $service)
    {
        return $service->execute($role);

    }
    public function show(Role $role)
    {
        return $role;
    }
    public function update(Role $role,StoringRoleRequest $request , UpdatingRoleService $service)
    {
        return $service->execute($role,$request->validated());

    }
}
