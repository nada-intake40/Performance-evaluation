<?php

namespace App\Services\Criterias;
use Illuminate\Http\Request;

use App\Repositories\CriteriaRepository;
use Illuminate\Support\Facades\DB;
use App\Services\Criteria\StoringCriteriaService;
use App\Repositories\RoleCriteriaRepository;
use App\Models\RoleCriteria;



class UpdatingCriteriaService
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
     * update criteria service
     *
     * @param $id
     * @param array $request
     * @return array
     */
    public function execute($id, array $request)
    {
        $data = $request;
        $model = new RoleCriteria();
        $roleRepo = new RoleCriteriaRepository($model);
        if($this->repo->getById($id)!=null &&$this->repo->count()>0){
            $this->repo->getById($id)->update($data);

            DB::table('role_criterias')->where('criteria_id',$id)->delete();       
            foreach ($request['group_id'] as $value){
                if ($request['roles']){
                    foreach($request['roles'] as $ele){
                        $arr = array("role_id"=>$ele, "group_id"=>$value, "criteria_id"=>$id);
                        $criteriaRole = $roleRepo->create($arr);
                    }
                }
                else{
                    $arr = array("group_id"=>$value, "criteria_id"=>$id);
                    $criteriaRole = $roleRepo->create($arr);
                }
            }

            return  response()->json($data);
        }
        else {
            return response()->json([
                "message" => "criteria can not update"
            ], 404);
        }

        return false;
    }







}
