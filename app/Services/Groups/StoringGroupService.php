<?php

namespace App\Services\Groups;
use Illuminate\Http\Request;

use App\Repositories\GroupRepository;


class  StoringGroupService
{
    protected $repo;


    /**
     * CreatingIndicatorService instance
     *
     * @param indicatorrepository $repo
     */
    public function __construct(GroupRepository $repo)
    {
        $this->repo = $repo;

    }


    /**
     * storing  group service
     *
     *
     * 
     */
    public function execute(Request $request)
    {
        $data = $request->all();

        $group = $this->repo->create($data);
        if($group){
            return  response()->json($group);
        }
        return false;

    }


}
