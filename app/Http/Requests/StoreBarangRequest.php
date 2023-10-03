<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
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
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'ditarik' => 'required',
            'user_id' => 'required',
            'produk_id' => 'required',
        ];
    }

    public function messages()
    {
        return ['kode_barang.required' => 'Anda belum memasukkan KODE barang!', 'nama_barang.required' => 'Anda belum memasukkan NAMA barang!', 'satuan.required' => 'Anda belum memasukkan SATUAN!', 'harga_jual.required' => 'Anda belum memasukkan HARGA JUAL!', 'stok.required' => 'Anda belum memasukkan STOK!', 'ditarik.required' => 'Anda belum memasukkan DITARIK!', 'user_id.required' => 'Anda belum memasukkan PETUGAS!', 'produk_id.required' => 'Anda belum memasukkan PRODUK!', 'kode_barang.unique' => 'Kode barang sudah ada!'];
    }
}
