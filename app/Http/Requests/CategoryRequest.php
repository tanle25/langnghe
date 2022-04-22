<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'slug' => 'required|unique:pages,slug,'.$_id.',id',
                'status'   => 'required',
            ];
        }else{
            return [
                'slug' => 'required|unique:pages',
                'status'   => 'required',
            ];
        }
        
    }
    public function messages()
    {
        return [
            'slug.required' => 'Đường dẫn không được để trống.',
            'slug.unique' => 'Đường dẫn không được trùng.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}
