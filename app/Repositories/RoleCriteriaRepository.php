<?php

namespace App\Repositories;

use App\Models\RoleCriteria;


class RoleCriteriaRepository extends BaseRepository
{
   
    public function __construct(RoleCriteria $roleCriteria)
    {
        parent::__construct($roleCriteria);
    }
}
