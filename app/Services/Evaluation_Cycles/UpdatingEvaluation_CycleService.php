<?php

namespace App\Services\Evaluation_Cycles;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Repositories\Evaluation_CycleRepository;

use Carbon\Carbon;
class UpdatingEvaluation_CycleService
{
    protected $repo;


    /**
     * Creating indicatorService instance
     *
     * @param Evaluation_Cyclerepository $repo
     */
    public function __construct(Evaluation_CycleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * update Indicator service
     *

     * @return array
     */
    public function execute($id, array $request)
    {
        $start=$request['start'];
       $dt = Carbon::parse($start);

       
        $cycle=$request['cycle'];

        $end=$dt->addMonths($cycle);
      
        $request['end'] = $end->toDateString();


        if($this->repo->getById($id)->update($request)){
             return  response()->json($request);
        }
        return false;
    }







}
