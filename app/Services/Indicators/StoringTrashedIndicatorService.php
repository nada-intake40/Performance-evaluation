<?php

namespace App\Services\Indicators;

use App\Repositories\IndicatorRepository;


class StoringTrashedIndicatorService
{
    protected $repo;

    /**
     * Creating criteriaService instance
     *
     * @param indicatorRepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;
    }


    /**
     * storing trashed indicator service
     *
     * @return array
     */
    public function execute($id)
    {
      
        if($this->repo->restoreTrash($id) != null&&$this->repo->count()>0){
            // return $this->repo->restoreTrash($id);
            return response()->json([
            "message" => "indicator restored"
            ]);
        }
        else
        {
            return response()->json([
                "message" => "indicator not found"
            ], 404);
        }
     

        }
       


   
}
