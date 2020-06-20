<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
