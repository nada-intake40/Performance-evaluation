<?php

namespace App\Services\Evaluation_Cycles;

use App\Repositories\Evaluation_CycleRepository;

class RetrievingEvaluation_CycleService
{
    protected $repo;

    /**
     * Creating Evaluation_CyclesService instance
     *
     * @param evaluation_cyclerepository $repo
     */
    public function __construct(Evaluation_CycleRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one Evaluation_Cycle service
     *
     * @return array
     */
    public function execute($id)
    {
        return $this->repo->getById($id);
    }
}
