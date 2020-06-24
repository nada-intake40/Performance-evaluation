<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatingIndicatorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'permissions' => 'nullable',
            

        ];
    }
}
