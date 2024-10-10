<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|between:8,20|confirmed',
            'password_confirmation' => 'required|between:8,20'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập Họ tên',
            'name.max' => 'Họ tên tối đa 255 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email tối đa 255 kí tự',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.between' => 'Mật khẩu ít nhất 8 và tối đa 20 kí tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
            'password_confirmation.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'password_confirmation.between' => 'Mật khẩu ít nhất 8 và tối đa 20 kí tự'
        ];
    }
}
