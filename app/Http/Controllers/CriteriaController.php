<?php

namespace App\Http\Controllers;

use App\Services\Criterias\DeletingCriteriaService;
use App\Services\Criterias\RetrievingAllCriteriasService;
use App\Services\Criterias\RetrievingCriteriaService;
use App\Services\Criterias\StoringCriteriaService;
use App\Services\Criterias\UpdatingCriteriaService;
use App\Services\Criterias\RetrivingTrashedCriteriasService;
use App\Services\Criterias\StoringTrashedCriteriaService;
use App\Services\Role_Criterias\RetrivingRoleCriteriasService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdatingCriteriaRequest;


class CriteriaController extends Controller
{
    public function index(RetrievingAllCriteriasService $service, Request $request)
    {
        return  $service->execute();
    }

    public function store(StoreCriteriaRequest $request ,StoringCriteriaService $service)
    {

        return $service->execute($request->validated());

    }
    public function destroy( $id,DeletingCriteriaService $service)
    {
        return $service->execute($id);

    }
    public function show(RetrievingCriteriaService $service ,$id)
    {
        return $service->execute($id);
    }
    public function update($id,UpdatingCriteriaRequest $request , UpdatingCriteriaService $service)
    {
        return $service->execute($id,$request->validated());

    }
    public function trash(RetrivingTrashedCriteriasService $service){
        return $service->execute();

    }
    public function restore( $id , StoringTrashedCriteriaService $service){
        return $service->execute($id);

    }
    public function getByRole( $id, $uid , RetrivingRoleCriteriasService $service){
        return $service->execute($id, $uid);

    }
}
