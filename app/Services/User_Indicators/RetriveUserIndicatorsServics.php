<?php

namespace App\Services\User_Indicators;

use App\Repositories\UserIndicatorRepository;
use App\Models\UserIndicator;


class RetriveUserIndicatorsService{

    protected $repo;

    public function __construct()
    {
        $user_indicator=new UserIndicator();
        // EvaluationRepository $repo
        $this->repo = new UserIndicatorRepository($user_indicator);     }

    public function execute($user_id)
    {   
        // $cycle_id = 1;
        $cycle_id = Evaluation_Cycle::where('is_current','true');
        return $this->repo->getByUserAndCycle($user_id, $cycle_id);
    }

}



?>