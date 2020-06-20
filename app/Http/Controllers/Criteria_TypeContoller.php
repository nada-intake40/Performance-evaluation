<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Criteria_Types\RetrievingAllCriteriaTypesService;

class Criteria_TypeContoller extends Controller
{
    public function index(RetrievingAllCriteriaTypesService $service, Request $request)
    {
        return  $service->execute();
    }
}
