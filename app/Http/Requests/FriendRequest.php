<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'url' => 'required|url',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => '邮箱不能为空',
            'name.required' => '网站名称不能为空',
            'url.required' => '网站地址不能为空',
            'email.email' => '邮箱格式不正确',
            'url.url' => '网站地址格式不正确',
        ];
    }
}
