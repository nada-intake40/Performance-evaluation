<?php

namespace App\Services\Evaluations;
use Illuminate\Http\Request;

use App\Repositories\CriteriaRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\CriteriaTypeRepository;
use App\Models\Evaluation_Cycle;
use App\Models\Criteria;
use App\Models\CriteriaType;
use App\Services\Criterias\RetrievingCriteriaService;
use App\Services\Criteria_Types\RetrivingCriteriaTypeService;
use App\Factory\DirectCriteriaFactory;
use App\Factory\AverageCriteriaFactory;



class  RetrivingUserEvaluationService
{
    protected $repo;

    public function __construct(EvaluationRepository $repo)
    {
        $this->repo = $repo;

    }

    public function execute($userId, $cycleId){
        $evaluations = $this->repo->getByUserAndCycle($userId, $cycleId);
        $values=$this->f1($evaluations);
        if($values){
            return  response()->json($values);
        }
        return false;

    }

    function f1($evaluations){
        $direct = [];
        $avg = [];
        $model = new Criteria();
        $repo = new CriteriaRepository($model);
        $service = new RetrievingCriteriaService($repo);
        $modelType = new CriteriaType();
        $repoType = new CriteriaTypeRepository($modelType);
        $serviceType = new RetrivingCriteriaTypeService($repoType);
        foreach($evaluations as  $value) {
            $criteria = $service->execute($value->criteria_id);
            $type = $serviceType->execute($criteria->type_id);

        if ($type->type == 'direct'){
            array_push($direct,$value);
        }
        elseif($type->type == 'average'){ 
            array_push($avg,$value);
        }
        }   
        $factory = new DirectCriteriaFactory();
        $factory1 = new AverageCriteriaFactory();
        $arr = $factory->calculate($direct);
        $arr2 = $factory1->calculate($avg);
        $criterias=$arr + $arr2;

    foreach($criterias as $key=>$value){
       $criteria = $service->execute($key);
        $criterias[$criteria->name]=$criterias[$key];
        unset($criterias[$key]);
    }

    return $criterias;
}
}
?>


  










