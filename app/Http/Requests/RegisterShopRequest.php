<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterShopRequest extends FormRequest
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
            'username' => 'required|string|max:30|unique:shops|regex:/^[A-Za-z][A-Za-z0-9]*$/',
            'password'   => 'required',
            'email'   => 'required|unique:shops',
            'dt'   => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tencs'   => 'required',
            'image_1'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_2'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'username.max' => 'Tên đăng nhập không được vượt quá 30 ký tự.',
            'username.regex' => 'Tên đăng nhập chứa ký tự không hợp lệ.',
            'username.string' => 'Tên đăng nhập chứa ký tự không hợp lệ.',
            'username.without_spaces' => 'Tên đăng nhập chứa ký tự không hợp lệ.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'email.required' => 'Email không được để trống.',
            'dt.required' => 'Email không được để trống.',
            'image.required' => 'Ảnh đại diện không được để trống.',
            'tencs.required' => 'Tên gian hàng không được để trống.',
            'image_1.required' => 'Ảnh giấy tờ không được để trống.',
        ];
    }
}
