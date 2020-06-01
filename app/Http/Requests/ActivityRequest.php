<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'about' => 'required',
            'start_activity' => 'required|date',
            'end_activity' => 'required|date',
            'finish' => 'nullable|boolean',
            'role_upload' => 'nullable|string|in:BIDER,RPK,KETUA,MEDKOM,ADMIN,HIKMAH,USER',
        ];
    }
}
