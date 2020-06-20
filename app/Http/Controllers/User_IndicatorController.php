<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\User_Indicators\CreateUserIndicatorService;

use App\Services\User_Indicators\RetriveUserIndicatorsService;

class User_IndicatorController extends Controller
{
    public function create (Request $request, CreateUserIndicatorService $service)
    {
        return $service->execute($request);
    }

    public function getUserIndicators($id , RetriveUserIndicatorsService $service)
    {
        return $service->execute($id);
    }
}
