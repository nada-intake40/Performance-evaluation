<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;

use phpDocumentor\Reflection\Types\Boolean;

class DeletingCriteriaService
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
     * Delete  criteria service
     *
     * @return array
     */
    public function execute($id)
    {

        if ($this->repo->getById($id)!= null) {
            return $this->repo->getById($id)->delete();
        }

        else
        {
            return response()->json([
                "message" => "unable to delete criteria"
            ], 404);
        }
    }
}
