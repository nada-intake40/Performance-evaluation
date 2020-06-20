<?php

namespace App\Services\Criterias;

use App\Repositories\CriteriaRepository;

class RetrievingAllCriteriasService
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
     * retrieving all criterias service
     *
     * @return array
     */
    public function execute()
    {
      
            return $this->repo->getAll();
     

        }


   /* try{
    $result=['status'=>200];
            $result['data']=$this->repo->getAll();}
            catch(Exception $e){
        $result=['status'=>404,'error'=>$e->getMessage()];
            }
return response()->json($result,$result['status']);
    }*/
}
