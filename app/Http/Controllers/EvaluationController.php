<?php

namespace App\Http\Controllers;
use App\Services\Evaluations\StoringEvaluationService;
use App\Services\Evaluations\RetrivingUserEvaluationService;


use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function store(Request $request, StoringEvaluationService $service)
    {
        return $service->execute($request);

    }
    public function getEvaluation($userId, $cycleId, RetrivingUserEvaluationService $service)
    {
        return $service->execute($userId, $cycleId);

    }
}
?>