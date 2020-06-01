<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaderRequest extends FormRequest
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
            'users_id' => 'required|integer',
            'nama' => 'nullable|string|max:255',
            'nim' => 'required|string|max:10',
            'prodi' => 'required|string|max:255',
            'ttl' => 'required|date',
            'alamat_asal' => 'required',
            'alamat_jogja' => 'required',
        ];
    }
}
