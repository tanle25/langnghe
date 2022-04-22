<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IconRequest extends FormRequest
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
            'image' => 'required',
            'status'   => 'required',
        ];
        
    }
    public function messages()
    {
        return [
            'image.required' => 'Ảnh không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}
