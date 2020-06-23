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
        $criteria_id = $criteria->id;
            foreach ($request['group_id'] as $value){
                if ($request['role']){
                    foreach($request['role'] as $ele){
                        $arr = array("role_id"=>$ele, "group_id"=>$value, "criteria_id"=>$criteria->id);
                        $criteriaRole = $roleRepo->create($arr);
                    }
                }
                else{
                    $arr = array("group_id"=>$value, "criteria_id"=>$criteria->id);
                    $criteriaRole = $roleRepo->create($arr);
                }
            }
            return response()->json($criteria);
        } else {
            return response()->json([
                "message" => "criteria can not create"
            ], 404);
        }

        return false;
    }

    // public function storeRoleCriteriaGroup($request, $criteria_id){
    //     $model = new RoleCriteria();
    //     $roleRepo = new RoleCriteriaRepository($model);
    //     foreach ($request['group_id'] as $value){
    //         if ($request['role']){
    //             foreach($request['role'] as $ele){
    //                 $arr = array("role_id"=>$ele, "group_id"=>$value, "criteria_id"=>$criteria_id);
    //                 $criteriaRole = $roleRepo->create($arr);
    //             }
    //         }
    //         else{
    //             $arr = array("group_id"=>$value, "criteria_id"=>$criteria_id);
    //             $criteriaRole = $roleRepo->create($arr);
    //         }
    //     }
    // }

}