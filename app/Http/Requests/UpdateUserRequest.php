<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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

            'name' =>'required|sometimes|min:3',
            'userName'=>'required|sometimes|min:3',
            'webSite'=>'required|sometimes|min:3',
            'bio' => 'required|sometimes',
            'telephone'=>'required|sometimes|integer|numeric',
            'email' => 'required|sometimes|email|unique:users,email,'.Auth::user()->id,
            'password' => 'required|sometimes|unique:users',
            'sexe' => 'required|sometimes|min:3|max:7'



        ];
    }
}
