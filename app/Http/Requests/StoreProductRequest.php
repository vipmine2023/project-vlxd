<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreProductRequest extends FormRequest
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
        $this->request->set('price', str_replace('.', '', $this->request->get('price')));
        $validation_params = [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer|min:1000',
            'image_name' => 'required|image|max:10240',
            'empty_description' => 'required|regex:(false)'
        ];

        if (Route::currentRouteName() == 'admin.update') {
            $validation_params['image_name'] = 'nullable|image|max:10240';
        }

        return $validation_params;
    }

    public function messages(): array
    {
        $max_price = $this->request->get('price') ? number_format($this->request->get('price'), 0, '', '.') : 0;
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm tối đa 255 kí tự',
            'description.required' => 'Vui lòng mô tả sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.integer' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm thấp nhất là 1000 đ',
            'image_name.required' => 'Vui lòng chọn hình của sản phẩm',
            'image_name.max' => 'Kích thước hình ảnh tối đa là 10MB',
            'image_name.image' => 'Hình sản phẩm không hợp lệ',
            'empty_description.required' => 'Vui lòng mô tả sản phẩm',
            'empty_description.regex' => 'Vui lòng mô tả sản phẩm'
        ];
    }
}
