<?php

namespace App\Services\Indicators;

use App\Repositories\IndicatorRepository;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingIndicatorService
{
    protected $repo;

    /**
     * Creating IndicatorService instance
     *
     * @param indicatorrepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * Delete  indicator service
     *
     * @return array
     */
    public function execute($id) : bool
    {

        return $this->repo->getById($id)->delete();
    }
}
