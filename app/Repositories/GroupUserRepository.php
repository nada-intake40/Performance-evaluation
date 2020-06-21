<?php

namespace App\Repositories;

use App\Models\GroupUser;

/**
 * Class CriteriaRepository
 * @package App\Repositories
 */
class CriteriaRepository extends BaseRepository
{
    /**
     * CriteriaRepository constructor.
     * @param GroupUser $groupUser
     */
    public function __construct(GroupUser $groupUser)
    {
        parent::__construct($groupUser);
    }
}
