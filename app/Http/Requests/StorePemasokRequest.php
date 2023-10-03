<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemasokRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pemasok' => 'required|unique:pemasok'
        ];
    }

    public function messages()
    {
        return ['nama_pemasok.required' => 'Anda belum memasukkan NAMA PELANGGAN!', 'nama_pemasok.unique' => 'Nama pemasok sudah ada!'];
    }
}
