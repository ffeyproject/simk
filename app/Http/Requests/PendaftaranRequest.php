<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
         return [
             'tgl_pendaftaran' => 'required',
             'nama_pendaftaran' => 'required',
             'no_telp' => 'required',
             'email' => 'required',
             'metode_pembayaran' => 'required',
            'bukti_pembayaran' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1500',
        ];
    }
}