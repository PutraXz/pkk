<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeddingRequest extends FormRequest
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
            'url' => 'required|string|max:50',
            'name_groom	' => 'required',
            'name_bride' => 'required',
            'child_groom' => 'required',
            'father_groom' => 'required',
            'mother_groom' => 'required',
            'child_bride' => 'required',
            'father_bride' => 'required',
            'mother_bride	' => 'required',
            'date_count	' => 'required',
            'image	' => 'image',
        ];
    }
}
