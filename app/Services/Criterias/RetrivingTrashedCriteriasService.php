<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;


class RetrivingTrashedCriteriasService
{
    protected $repo;

    /**
     * Creating criteriaService instance
     *
     * @param criteriarepository $repo
     */
    public function __construct(CriteriaRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving trashed criterias service
     *
     * @return array
     */
    public function execute()
    {
      
        if ((!$this->repo->getTrash()->isEmpty())) {
            return $this->repo->getTrash();
        } else {
            return response()->json([
                "message" => "Empty Content"
            ], 204);
        }
     

        }
       


   
}
