<?php

namespace App\Factory;
use App\Factory\CriteriaFactory;
use App\Models\Criteria;

class AverageCriteriaFactory extends CriteriaFactory {

    public function calculate($values){

        $arr=[];
        $criterias=[];
        foreach ($values as $value) {
            // dd($value->criteria_id);
           if(!array_key_exists($value->criteria_id,$arr))
             {
                $arr[$value->criteria_id]=(object)[
                    'value' => $value->value,
                    'count' => 1,
                    ]; 
             }else 
                 {
                    $arr[$value->criteria_id]->value+= $value->value;
                    $arr[$value->criteria_id]->count+= 1;
                    
                 }
    }

        foreach ($arr as $key=>$element) {
            $criterias[$key]=($element->value/$element->count);
        }
        // dd($criterias);
        return $criterias;
    }

    /* loop arr
 
    if cri !exist
    name = > value
    numer = > 3dd
    if exist
    name=> value + new vakue
    num = > num+1
    */
}


?>