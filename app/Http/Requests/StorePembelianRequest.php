<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
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
            'kode_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'total' => 'required',
            'pemasok_id' => 'required',
            'barang_id' => 'required',
            'harga_beli' => 'required',
            'jumlah' => 'required',
            'sub_total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_masuk.required' => 'Anda belum memasukkan KODE!',
            'tanggal_masuk.required' => 'Anda belum memasukkan TANGGAL!',
            'pemasok_id.required' => 'Anda belum memasukkan PEMASOK!',
            'barang_id.required' => 'Anda belum memasukkan BARANG!'
        ];
    }
}
