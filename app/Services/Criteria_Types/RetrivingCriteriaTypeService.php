<?php

namespace App\Services\Criteria_Types;

use App\Repositories\CriteriaTypeRepository;

class RetrivingCriteriaTypeService
{
    protected $repo;

   
    public function __construct(CriteriaTypeRepository $repo)
    {
        $this->repo = $repo;
    }


    public function execute($id)
    {
        if($this->repo->getById($id) != null&&$this->repo->count()>0){
            return $this->repo->getById($id);
        } else {
            return response()->json([
                "message" => "Type  not found"
            ], 404);
        }
    }
}

?>