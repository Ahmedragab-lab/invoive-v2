<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeinvoicedata extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'invoice_number' => 'required',
            'invoice_date' => 'required',
            'discount' => 'required',
            // 'tax_rate' => 'required',
            // 'tax_value' => 'required',
            // 'total' => 'required',

        ];
    }
    public function messages()
    {
        return [
                'discount.required' => 'هذا الحقل مطلوب',

        ];
    }
}
