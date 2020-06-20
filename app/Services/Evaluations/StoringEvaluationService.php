<?php

namespace App\Services\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\EvaluationRepository;
use App\Models\Evaluation_Cycle;

use App\Models\Evaluation;
class  StoringEvaluationService
{
    protected $repo;

    public function __construct(EvaluationRepository $repo)
    {
        $this->repo = $repo;

    }

    public function execute(Request $request)
    {
        $data = $request->all();
        $user_id = $data['user_id'];
        $evaluator_id= $data['evaluator_id'];
        $criteria= $data['criteria_id'];

        $cycle = Evaluation_Cycle::where('is_current',1)->first();
        $data['cycle_id'] = $cycle->id;

        $evaluation_user = DB::table('evaluations')->where('user_id',$user_id)->
        where('cycle_id',$cycle->id)
        ->where('evaluator_id',$evaluator_id)->where('criteria_id',$criteria)->exists();
        if($evaluation_user){
            return  response()->json(['error_message'=>'you evaluate employee before']);
        }
        
        else{
        $evaluation = $this->repo->create($data);
        if($evaluation){
            return  response()->json($evaluation);
        }
    }
        return false;

    }


}
?>