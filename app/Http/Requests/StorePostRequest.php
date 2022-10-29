<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule=[
            'title' => ['required', 'min:3', 'unique:posts,title'],
            'description' => ['required', 'min:10'],
            'user_id' => 'exists:users,id',
            'image' => ["mimes:jpg,png"],
        ];

        if($this->method() == 'PUT'){
            $rule = array_merge($rule, ['title' => ['required', 'min:3',"unique:posts,title,".$this->route()->post] ]  );
        }

        return $rule;
    }

    // public function messages(){
    //     return [
    //         'title.required' => 'my custom validation error message',
    //         'title.min' => 'we have made override for min'
    //     ];
    // }
}
