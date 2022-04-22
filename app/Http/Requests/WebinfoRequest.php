<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin\Webinfo;

class WebinfoRequest extends FormRequest
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
                'code' => 'required|unique:webinfos,code,'.$_id.',id',
                'status'   => 'required',
            ];
        }else{
            return [
                'code' => 'required|unique:webinfos',
                'status'   => 'required',
            ];
        }
        
    }
    public function messages()
    {
        return [
            'code.required' => 'Thuộc tính không được để trống.',
            'code.unique' => 'Thuộc tính không được trùng.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}
