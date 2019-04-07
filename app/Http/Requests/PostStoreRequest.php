<?php

namespace SuperGamer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'         =>      'required',
            'slug'          =>      'required|unique:posts,slug',
            'user_id'       =>      'required|integer',
            'category_id'   =>      'required|integer',
            'tags'          =>      'required|array',
            'body'          =>      'required',
            'status'        =>      'required|in:DRAFT,PUBLISHED',
        ];

        if($this->get('file'))
            $rules=array_merge($rules, ['file'  =>  'mimes:jpg,jpeg,png,gif']);

            return $rules;
    }
}
