<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCriteriaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:criterias,name',
            'type_id' => 'required|integer',
            'role' => 'required'

        ];
    }

}
