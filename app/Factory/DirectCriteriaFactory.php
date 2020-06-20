<?php

namespace App\Factory;
use App\Factory\CriteriaFactory;

class DirectCriteriaFactory extends CriteriaFactory {


    public function calculate($values){
    
        $direct=[];
        foreach ($values as $value) {
           $direct[$value->criteria_id]=$value->value;
        }
        // dd($direct);
        return $direct;
    }
}


?>