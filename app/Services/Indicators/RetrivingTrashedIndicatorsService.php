<?php

namespace App\Services\Indicators;

use App\Repositories\IndicatorRepository;


class RetrivingTrashedIndicatorsService
{
    protected $repo;

    /**
     * Creating criteriaService instance
     *
     * @param indicatorRepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving trashed indicators service
     *
     * @return array
     */
    public function execute()
    {
      
        if (!$this->repo->getTrash()->isEmpty()) {
            return $this->repo->getTrash();
        } else {
            return response()->json([
                "message" => "Empty Content"
            ], 204);
        }
     

        }
       


   
}
