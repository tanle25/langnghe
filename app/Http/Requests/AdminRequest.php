<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin;

class AdminRequest extends FormRequest
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
            $_id = $this->get('user_id');
            return [
                'email' => 'required|unique:admins,email,'.$_id.',id',
                'username'   => 'required|unique:admins,username,'.$_id.',id',
            ];
        }else{
            return [
                'email' => 'required|unique:admins',
                'username'   => 'required|unique:admins',
                'password'   => 'required',
            ];
        }
    }
}
