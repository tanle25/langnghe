<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->method() == 'PATCH'){
            $_id = $this->get('_id');
            return [
                'name'   => 'required',
                'type_product_id'   => 'required',
                'shop_id'   => 'required',
                'status'   => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            ];
        }else{
            return [
                'name'   => 'required',
                'type_product_id'   => 'required',
                'shop_id'   => 'required',
                'status'   => 'required',
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            ];
        }

    }
    public function messages()
    {
        return [
            'slug.required' => 'Đường dẫn không được để trống.',
            'slug.unique' => 'Đường dẫn không được trùng.',
            'product_code.required' => 'Mã sản phẩm không được để trống.',
            'product_code.unique' => 'Mã sản phẩm không được trùng.',
            'status.required' => 'Trạng thái không được để trống.',
            'name.required' => 'Tên sản phẩm không không được để trống.',
            'type_product_id.required' => 'Loại sản phẩm không không được để trống.',
            'shop_id.required' => 'Cơ sở kinh doanh không không được để trống.',
        ];
    }
}
