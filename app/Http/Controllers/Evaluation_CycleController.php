<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreEvaluation_cycleRequest;
use App\Http\Requests\UpdateEvaluation_cycleRequest;
use Illuminate\Http\Request;

use App\Services\Evaluation_Cycles\RetrievingAllEvaluation_CyclesService;
use App\Services\Evaluation_Cycles\RetrievingEvaluation_CycleService;
use App\Services\Evaluation_Cycles\StoringEvaluation_CycleService;
use App\Services\Evaluation_Cycles\UpdatingEvaluation_CycleService;
use App\Services\Evaluation_Cycles\DeletingEvaluation_cycleService;

class Evaluation_CycleController extends Controller
{
    public function index(RetrievingAllEvaluation_CyclesService $service, Request $request)
    {
        return $service->execute();
    }

    public function store(StoreEvaluation_cycleRequest $request,StoringEvaluation_CycleService $service)
    {
        return $service->execute($request->validated());

    }

    public function destroy($id, DeletingEvaluation_cycleService $service)
    {
        return $service->execute($id);

    }

    public function show(RetrievingEvaluation_CycleService $service, $id)
    {
        return $service->execute($id);
    }

    public function update($id,UpdateEvaluation_cycleRequest $request, UpdatingEvaluation_CycleService $service)
    {
        return $service->execute($id, $request->validated());

    }
}
