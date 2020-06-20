<?php

namespace App\Services\Role_Criterias;

use App\Models\User;
use App\Repositories\RoleCriteriaRepository;
use App\Models\Criteria;


class RetrivingRoleCriteriasService
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
    public function execute($roleId, $userId)
    {
        // if($this->repo->getAllById($roleId) != null&&$this->repo->count()>0){


            $criteriasId = [];
            $user = User::find($userId);
            $roleCriterias = $this->repo->getAllById($roleId);
            foreach ($roleCriterias as $value){
                array_push($criteriasId,$value->criteria_id);
            }
            if(($user->hasRole('Manager')) || ($user->hasRole('Senior Developer'))){
                $criterias = Criteria::whereIn('id',$criteriasId)->where('type_id',1)->get();
            }
            elseif($user->hasRole('ProductOwner')){ 
                $criterias = Criteria::whereIn('id',$criteriasId)->where('type_id',2)->get();
            } else{ 
                $criterias = Criteria::whereIn('id',$criteriasId)->whereIn('type_id',[2,3])->get();
            }

            
            return $criterias;
        // }
        // else
        // {
        //     return response()->json([
        //         "message" => "criteria not found"
        //     ], 404);
        // }
    }
}
