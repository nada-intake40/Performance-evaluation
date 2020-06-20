<?php

use Illuminate\Database\Seeder;
use  App\Models\CriteriaType;

class CriteriaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(CriteriaType::whereIn('type', ['average','mathemtical','direct','average by team'])->exists())
        {

        }else{
        CriteriaType::create(['type'=> 'direct']);
        CriteriaType::create(['type'=> 'average']);
        CriteriaType::create(['type'=> 'average by team']);
        CriteriaType::create(['type'=> 'mathemtical']);
        }
    }
}
