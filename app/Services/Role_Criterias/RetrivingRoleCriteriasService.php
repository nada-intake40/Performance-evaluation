<?php

namespace App\Services\Role_Criterias;

use App\Models\User;
use App\Repositories\RoleCriteriaRepository;
use App\Models\Criteria;
use Illuminate\Support\Facades\DB;



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
    public function execute($evaluatorId, $userId)
    {

            $criteriasId = [];
            $user = User::find($userId);
            $user_role = DB::table('model_has_roles')->where('model_id',$userId)->get();
            $grps_id_user = DB::table('groups_users')->where('user_id',$userId)->pluck('group_id');
            // to get all criterias for specific group
            $grp_id_evaluator = DB::table('groups_users')->where('user_id',$evaluatorId)
            ->whereIn('group_id',$grps_id_user, )->pluck('group_id');

            foreach($grp_id_evaluator as $grpId){
            $roleCriterias = $this->repo->getAllById($grpId);
            foreach ($roleCriterias as $value){
                if($value->role_id == null || $value->role_id == $user_role[0]->role_id){
                array_push($criteriasId,$value->criteria_id);
                }
            }
            }
            if($user->supervisor == $evaluatorId ){
                $criterias = Criteria::whereIn('id',$criteriasId)->where('type_id',1)->get();
            }
            else{
                $criterias = Criteria::whereIn('id',$criteriasId)->where('type_id',2)->get();           
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
