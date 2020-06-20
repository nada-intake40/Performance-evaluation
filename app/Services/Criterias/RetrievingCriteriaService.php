<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;

class RetrievingCriteriaService
{
    protected $repo;

    /**
     * Creating CriteraService instance
     *
     * @param criteriarepository $repo
     */
    public function __construct(CriteriaRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one Criteria service
     *
     * @return array
     */
    public function execute($id)
    {
        if($this->repo->getById($id) != null&&$this->repo->count()>0){
            return $this->repo->getById($id);
            // ->delete();
        }
        else
        {
            return response()->json([
                "message" => "criteria not found"
            ], 404);
        }
    }
}
