<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
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

            $id = $this->get('_id');
            return [
                'slug'  => 'unique:threads,slug,'.$id.',id',
                'type'  => 'required',
                'name'  => 'required',
                'content'  => 'required',
                'type_product_id'  => 'required',
                'xa'  => 'required',
                'end_date'  => 'required',
                'address'  => 'required',
                'phone'  => 'required',
               
            ];
        }else{
            return [
                'slug'  => 'unique:threads',
                'type'  => 'required',
                'name'  => 'required',
                'content'  => 'required',
                'type_product_id'  => 'required',
                'xa'  => 'required',
                'end_date'  => 'required',
                'address'  => 'required',
                'phone'  => 'required',
               
            ];
        }          
    }

    public function messages()
    {
        return [
            'slug.unique' => 'Tiêu đề tin đăng đã tồn tại.',
            'type.required' => 'Loại thông tin không được để trống.',
            'name.required' => 'Tiêu đề không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'type_product_id.required' => 'Loại sản phẩm không được để trống.',
            'xa.required' => 'Khu vực giao hàng không được để trống.',
            'end_date.required' => 'Thời hạn đăng tin  không được để trống.',
            'address.required' => 'Địa chỉ liên hệ  không được để trống.',
            'phone.required' => 'Điện thoại không được để trống.',
        ];
    }
}
