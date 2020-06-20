<?php

namespace App\Services\Role_Criterias;

use App\Repositories\RoleCriteriaRepository;

class StoreRoleCriteriaService
{
    protected $repo;

    /**
     * Creating Role_Criterias instance
     *
     * @param RoleCriteriaRepository $repo
     */
    public function __construct(RoleCriteriaRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * retrieving one Criteria service
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $data = $request->all();
        $roleCriteria = $this->repo->create($data);
        if($roleCriteria){
            return  response()->json($roleCriteria);
        }
        return false;
    }
}
