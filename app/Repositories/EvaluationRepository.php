<?php

namespace App\Repositories;

use App\Models\Evaluation;


class EvaluationRepository extends BaseRepository
{
   
    public function __construct(Evaluation $evaluation)
    {
        parent::__construct($evaluation);
    }
}
?>