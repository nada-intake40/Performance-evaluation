<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Groups\StoringGroupService;
use App\Services\Groups\RetrivingAllGroupsService;

class GroupController extends Controller
{
    public function index(RetrivingAllGroupsService $service)
    {
        return  $service->execute();
    }

    public function store(Request $request ,StoringGroupService $service)
    {

        return $service->execute($request);

    }
}
