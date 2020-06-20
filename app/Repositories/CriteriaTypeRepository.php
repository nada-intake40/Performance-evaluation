<?php

namespace App\Repositories;

use App\Models\CriteriaType;


class CriteriaTypeRepository extends BaseRepository
{
   
    public function __construct(CriteriaType $criteriatype)
    {
        parent::__construct($criteriatype);
    }
}
