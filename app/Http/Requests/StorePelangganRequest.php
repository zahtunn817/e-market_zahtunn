<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode_pelanggan' => 'required|unique:pelanggan',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|unique:pelanggan',
            'email' => 'required|unique:pelanggan'
        ];
    }

    public function messages()
    {
        return ['kode_pelanggan.required' => 'Anda belum memasukkan KODE PELANGGAN!', 'nama_pelanggan.required' => 'Anda belum memasukkan NAMA PELANGGAN!', 'alamat.required' => 'Anda belum memasukkan ALAMAT!', 'no_telp.required' => 'Anda belum memasukkan NO TELPON!', 'email.required' => 'Anda belum memasukkan EMAIL!', 'kode_pelanggan.unique' => 'Kode pelanggan sudah ada!', 'no_telp.unique' => 'No Telepon sudah ada!', 'email.unique' => 'Email sudah ada!', 'no_telp.numeric' => 'No Telepon harus berupa angka!'];
    }
}
