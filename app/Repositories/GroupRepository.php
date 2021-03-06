<?php

namespace App\Repositories;

use App\Models\Group;

/**
 * Class CriteriaRepository
 * @package App\Repositories
 */
class GroupRepository extends BaseRepository
{
    /**
     * CriteriaRepository constructor.
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        parent::__construct($group);
    }
}
