<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'akses_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Anda belum memasukkan NAMA PETUGAS!', 'email.required' => 'Anda belum memasukkan EMAIL!', 'password.required' => 'Anda belum memasukkan PASSWORD!', 'akses_id.required' => 'Anda belum memasukkan HAK AKSES!', 'email.unique' => 'Email sudah ada!'
        ];
    }
}
