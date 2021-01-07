<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            //
            // 'required|max:255'
            'customer_name' => 'required|max:255',
            'customer_address' => 'required|max:255',
            'customer_email' => 'required|max:3',
            'customer_phone' => 'required|max:255',
            'customer_address_detail' => 'required|max:255',
            'customer_zip_code' => 'required|max:255',
            'zone_code' => 'required|max:255'
            // 'customer_name' => ['required', 'string', 'max:255'],
            // 'customer_address' => ['required', 'string', 'max:255'],
            // 'customer_email' => ['required', 'string', 'max:255', 'email'],
            // 'customer_phone' => ['required', 'integer', 'max:255'],
            // 'customer_address_detail' => ['required', 'string', 'max:255'],
            // 'customer_zip_code' => ['required', 'string', 'max:255'],
            // 'zone_code' => ['required', 'string', 'max:255'],
        ];
    }
}
