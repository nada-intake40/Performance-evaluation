<?php

namespace App\Services\Criterias;
use App\Repositories\CriteriaRepository;
use App\Repositories\RoleCriteriaRepository;
use App\Models\RoleCriteria;
// namespace App\Services\Role_Criterias\StoreRoleCriteriaService;



class  StoringCriteriaService
{
    protected $repo;


    /**
     * Creating CriteriaService instance
     *
     * @param criteriarepository $repo
     */
    public function __construct(CriteriaRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * storing  criteria service
     *
     *
     *
     * @param array $request
     * @return array
     */
    public function execute(array $request)
    {  
        $model = new RoleCriteria();
        $roleRepo = new RoleCriteriaRepository($model);

        $criteria = $this->repo->create($request);
        if ($criteria) {
            foreach ($request['role'] as $value){
                 $arr = array("role_id"=>$value, "criteria_id"=>$criteria->id);
             $criteriaRole = $roleRepo->create($arr);
            }
            return response()->json($criteria);
        } else {
            return response()->json([
                "message" => "criteria can not create"
            ], 404);
        }

        return false;
    }

}