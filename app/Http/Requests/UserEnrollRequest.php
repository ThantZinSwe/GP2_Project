<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEnrollRequest extends FormRequest
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
            'phone' => 'required|max:11|regex:/(0)[0-9]{9}/',
            'image' => 'required',
        ];
    }
}
