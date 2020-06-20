<?php

namespace App\Services\Indicators;

use App\Repositories\IndicatorRepository;

class RetrievingIndicatorService
{
    protected $repo;

    /**
     * Creating RoleService instance
     *
     * @param indicatorrepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one Indicator service
     *
     * @return array
     */
    public function execute($id)
    {
        return $this->repo->getById($id);
    }
}
