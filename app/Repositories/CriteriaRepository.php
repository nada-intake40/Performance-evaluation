<?php

namespace App\Repositories;

use App\Models\Criteria;

/**
 * Class CriteriaRepository
 * @package App\Repositories
 */
class CriteriaRepository extends BaseRepository
{
    /**
     * CriteriaRepository constructor.
     * @param Criteria $criteria
     */
    public function __construct(Criteria $criteria)
    {
        parent::__construct($criteria);
    }
}
