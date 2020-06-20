<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\Repositories\BaseEvaluationRepository;
;

class UserIndicatorRepository implements BaseEvaluationRepository{
    private $model = null;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes){
        return $this->model->create($attributes);
    }
    public function getByUserAndCycle($user_id, $cycle_id){
        return $this->model->where ('user_id',$user_id )
        ->where('cycle_id', $cycle_id)
        ->get();
    }
    // public function update($id, array $attributes){

    // }

    
  
}

?>