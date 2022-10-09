<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelatihRequest extends FormRequest
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
            'level_id' => 'required',
            'nama' => 'required|unique:instructures,nama',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'fb' => 'required',
            'twitter' => 'required',
            'ig' => 'required',
        ];
    }
}