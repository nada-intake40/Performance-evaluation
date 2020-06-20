<?php

namespace App\Services\Indicators;
use Illuminate\Http\Request;

use App\Repositories\IndicatorRepository;


class UpdatingIndicatorService
{
    protected $repo;


    /**
     * Creating indicatorService instance
     *
     * @param indicatorrepository $repo
     */
    public function __construct(IndicatorRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * update Indicator service
     *

     * @return array
     */
    public function execute($id,array $request)
    {
        $data = $request;


        if($this->repo->getById($id)->update($data)){
             return  response()->json($data);
        }
        return false;
    }







}
