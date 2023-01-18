<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'status_code' => 'required',
            'status_message' => 'required', 
            'transaction_id' => 'required',
            'order_id' => 'required',
            'gross_amount' => 'required',
            'transaction_status' => 'required',
            'payment_code' => 'required',
            'pdf_url' => 'required',
        ];
    }
}
