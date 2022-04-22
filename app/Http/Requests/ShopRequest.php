<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class ShopRequest extends FormRequest
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
                'email' => 'required|unique:shops,email,'.$_id.',id',
                'image'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tencs'   => 'required',
                'image_1'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image_2'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ];
        }else{
            return [
                'username' => 'required|unique:shops',
                'email' => 'required|unique:shops',
                'password'   => 'required',
                'status'   => 'required',
                'tencs'   => 'required',
                'loaidn'   => 'required',
                'huyen'   => 'required',
                'xa'   => 'required',
                'xom'   => 'required',
                'dt'   => 'required',
                'nganhql'   => 'required',
                'sogiay'   => 'required',
                'coquancp'   => 'required',
                'ngaycap'   => 'required',
                'image'   => 'required',
                'nguoidaidien'   => 'required',
                'quymo'   => 'required',
                'loaigiayto'   => 'required',
            ];
        }
        
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email không được trùng.',
            'username.required' => 'Tên người dùng không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'tencs.required' => 'Tên cơ sở kinh doanh không được để trống.',
            'loaidn.required' => 'Loại hình doanh nghiệp không được để trống.',
            'huyen.required' => 'Quận/Huyện không được để trống.',
            'xa.required' => 'Xã/Phường không được để trống.',
            'xom.required' => 'Xóm/SN/Đường không được để trống.',
            'dt.required' => 'Điện thoại không được để trống.',
            'nganhql.required' => 'Ngành quản lý không được để trống.',
            'sogiay.required' => 'Số giấy không được để trống.',
            'coquancp.required' => 'Cơ quan cấp phép không được để trống.',
            'ngaycap.required' => 'Ngày cấp không được để trống.',
            'image.required' => 'Ảnh đại diện không được để trống.',
            'nguoidaidien.required' => 'Người đại diện không được để trống.',
            'quymo.required' => 'Quy mô không được để trống.',
            'loaigiayto.required' => 'Loại giấy tờ không được để trống.',
        ];
    }
}
