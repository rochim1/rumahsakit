<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required|min:8'
        ]; 
    }

    // fungsi ini dibuat manual : 
    public function messages()
    {
        return [
            'email.required' => 'email Tidak Boleh Kosong',
            'password.required' => 'password tidak boleh kosong',
            'password.required' => 'password minimal 8 karakter',
        ];
    }
}
