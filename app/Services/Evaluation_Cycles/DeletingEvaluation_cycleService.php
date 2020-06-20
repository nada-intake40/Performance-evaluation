<?php

namespace App\Services\Evaluation_Cycles;

use App\Repositories\Evaluation_CycleRepository;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingEvaluation_cycleService
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
     * Delete  evaluation_cycle service
     *
     * @return array
     */
    public function execute($id) : bool
    {

        return $this->repo->getById($id)->delete();
    }
}
