<?php

namespace App\Services\Criteria_Types;

use App\Repositories\CriteriaTypeRepository;

class RetrievingAllCriteriaTypesService
{
    protected $repo;

   
    public function __construct(CriteriaTypeRepository $repo)
    {
        $this->repo = $repo;
    }


    public function execute()
    {
        if (!$this->repo->getAll()->isEmpty()&&$this->repo->count()>0) {
            return $this->repo->getAll();
        } else {
            return response()->json([
                "message" => "criteria types not found"
            ], 404);
        }
    }
}

?>