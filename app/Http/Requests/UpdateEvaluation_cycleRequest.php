<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvaluation_cycleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'cycle' => 'required|integer',
            'start'=>'required'
           
            

        ];
    }
}
