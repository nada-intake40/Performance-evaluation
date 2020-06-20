<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;


class StoringTrashedCriteriaService
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
     * storing a trashed criteria service
     *
     * @return array
     */
    public function execute($id)
    {
      
        if($this->repo->restoreTrash($id) != null&&$this->repo->count()>0){
            // return $this->repo->restoreTrash($id);
            return response()->json([
            "message" => "criteria restored"
            ]);
        }
        else
        {
            return response()->json([
                "message" => "criteria not found"
            ], 404);
        }
   }
       


   
}
