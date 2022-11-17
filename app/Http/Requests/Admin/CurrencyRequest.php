<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            "name" => 'required|string|max:255',
            "short_name" => 'required|string|max:255',
            "name_iso" => 'required|string|max:255',
            "code_iso" => 'required|string|max:255',
            "symbol_iso" => 'required|string|max:255',
            "name1" => 'required|string|max:255',
            "name2" => 'required|string|max:255',
            "name3" => 'required|string|max:255',
        ];
    }
}
