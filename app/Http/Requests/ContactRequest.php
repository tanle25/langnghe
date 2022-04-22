<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'phone'   => 'required',
            'title' => 'required',
            'content'   => 'required',
        ];
        
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được để trống.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'title.required' => 'Tiêu đề không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
        ];
    }
}
