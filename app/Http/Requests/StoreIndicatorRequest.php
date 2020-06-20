<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIndicatorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:indicators,name,criteria_id',
            'criteria_id'=>'required|exists:criterias,id',
            // 'is_positive'=>'required'



        ];
    }
}
