<?php

namespace App\Services\Evaluation_Cycles;

use App\Repositories\Evaluation_CycleRepository;

class RetrievingAllEvaluation_CyclesService
{
    protected $repo;

    /**
     * Creating Evaluation_CycleService instance
     *
     * @param evaluation_cyclerepository $repo
     */
    public function __construct(Evaluation_CycleRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving all Evaluation_Cycles service
     *
     * @return array
     */
    public function execute()
    {
        return $this->repo->getAll();
    }
}
