<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        return [
            'payload'=>['required']
        ];
    }
    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['status' => false,'ErrorCode' => 400,'errors' =>$validator->errors()->all()],422));
   }
}
