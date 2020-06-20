<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatingCriteriaRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'type_id' => 'required|integer',
        ];
    }


}
