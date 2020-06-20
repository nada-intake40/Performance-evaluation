<?php

namespace App\Repositories;

use App\Models\Evaluation_Cycle;

/**
 * Class Repository
 * @package App\Repositories
 */
class Evaluation_CycleRepository extends BaseRepository
{
    /**
     * Evaluation_CycleRepository constructor.
     * @param Evaluation_Cycle $evaluation_cycle
     */
    public function __construct(Evaluation_Cycle $evaluation_cycle)
    {
        parent::__construct($evaluation_cycle);
    }
}
