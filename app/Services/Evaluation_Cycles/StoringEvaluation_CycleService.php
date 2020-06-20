<?php

namespace App\Services\Evaluation_Cycles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Evaluation_Cycle;

use App\Repositories\Evaluation_CycleRepository;
use Carbon\Carbon;

class  StoringEvaluation_CycleService
{
    protected $repo;


    /**
     * CreatingEvaluation_CycleService instance
     *
     * @param evaluation_cyclerepository $repo
     */
    public function __construct(Evaluation_CycleRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * soring  Evaluation_Cycle service
     *
     *
     * @param array $request
     * @return array
     */
    public function execute(array $request)
    {
        
       
            $CheckData=DB::table('evaluation_cycles')
            ->where([
                ['is_current',1],
                ['deleted_at', NUll]])->count();
            if($CheckData!=0){
                return  response()->json(['error_message'=>'can not create untill this cycle end']);
            }
        else{
        $start=$request['start'];
       $dt = Carbon::create($start);
        $cycle=$request['cycle'];

        $end=$dt->addMonths($cycle);
        $request['end'] = $end->toDateString();
        $evaluation_cycle = $this->repo->create($request);
        
        if($evaluation_cycle){
            return  response()->json($evaluation_cycle);
        }
    }
        return false;

    }


}
