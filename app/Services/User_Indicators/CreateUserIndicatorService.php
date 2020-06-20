<?php

namespace App\Services\User_Indicators;

use App\Http\Resources\User;
use App\Repositories\UserIndicatorRepository;
use Illuminate\Http\Request;
use App\Models\UserIndicator;

class CreateUserIndicatorService{

    protected $repo;

    public function __construct()
    {
        $user_indicator=new UserIndicator();
        $this->repo = new UserIndicatorRepository($user_indicator); 
    }

    public function execute(Request $request)
    {   
        $data = $request->all(); 
        return $this->repo->create($data);
    }

}

?>