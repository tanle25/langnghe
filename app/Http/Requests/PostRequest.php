<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'image'  => 'required',
                'name'  => 'required',
                'des_s'  => 'required',
                'cat_id'  => 'required',
                'image'=>'mimes:jpeg,jpg,png,gif|required|max:10000'
            ];
        }else{
            return [
                'image'  => 'required',
                'name'  => 'required',
                'des_s'  => 'required',
                'cat_id'  => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'image.required' => 'Ảnh không được để trống.',
            'name.required' => 'Tên không được để trống.',
            'des_s.required' => 'Miêu tả ngắn không được để trống.',
            'cat_id.required' => 'Chuyên mục không được để trống.',
        ];
    }
}
