<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
        [
            'title'=>'required|string|max:250',
            'description'=>'required|string',
            'priority'=>'required|in:high,medium,low'
        ];
    }
    public function messages(): array
    {
        return
        [
            'title.required' => 'عنوان العمل مطلوب',
            'description.required' => 'A description is required',
        ];
    }
}
