<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'first_name'=>'required|string|max:255',
            'last_name'=>'string|max:255',
            'middle_name'=>'string|max:255',
            'email'=>'string|max:255',
            'phone'=>'string|max:255',
        ];
    }
}
