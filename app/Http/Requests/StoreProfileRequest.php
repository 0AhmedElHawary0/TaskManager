<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfileRequest extends FormRequest
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
            'user_id' =>'required|exists:users,id',
            'address' => 'nullable|string|max:100',
            'phone'=>'required|string|max:15',
            'date_of_birth' =>'nullable|date',
            'bio'=>'nullable|string',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
