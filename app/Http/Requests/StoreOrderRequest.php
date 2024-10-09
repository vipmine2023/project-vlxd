<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,11',
            'receiver_name' => 'required|max:255',
            'address' => 'required|max:1000',
            'payment_method' => 'required|numeric',
            'note' => 'max:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'phone.required' => 'Vui lòng số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
            'receiver_name.required' => 'Vui lòng nhập họ tên',
            'receiver_name.max' => 'Họ tên tối đa 255 kí tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ tối đa 1000 kí tự',
            'note.max' => 'Ghi chú tối đa 1000 kí tự'
        ];
    }
}
