<?php

namespace App\Repositories;

use App\Models\GroupsUser;

/**
 * Class CriteriaRepository
 * @package App\Repositories
 */
class GroupUserRepository extends BaseRepository
{
    /**
     * CriteriaRepository constructor.
     * @param GroupUser $groupUser
     */
    public function __construct(GroupsUser $groupUser)
    {
        parent::__construct($groupUser);
    }
}
