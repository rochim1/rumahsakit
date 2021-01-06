<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class doktervalidupdate extends FormRequest
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'NIK' => 'required|min:16',
            'nomor_str' => 'nullable|min:10',
            'email' => 'sometimes|email',
            'telpon' => 'required|min:8',
            'tanggal_lahir' => 'required',
            'spesialis' => 'required',
            'universitas' => 'required',
            'agama' => 'required',
            'alamat' => 'nullable|required',
            'foto' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama Tidak Boleh Kosong',
            'NIK.required' => 'NIK tidak boleh kosong',
            'NIK.required' => 'NIK harus 16 karakter',
        ];
    }
}
