<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'user_id' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required',
            'tempat_lahir' => 'required',
            'no_hp' => 'required',
            'nama_ortu' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1500'
        ];
    }
}