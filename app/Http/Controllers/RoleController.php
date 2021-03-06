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
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function index(RetrievingAllRolesService $service, Request $request)
    {
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
        $permissions = DB::table('role_has_permissions')->where('permission_id', $role->id)->pluck('role_id');
        $role['permissions']= $permissions;
        return $role;
    }
    public function update( $id,StoringRoleRequest $request , UpdatingRoleService $service)
    {
        return $service->execute($id,$request->validated());

    }
}
