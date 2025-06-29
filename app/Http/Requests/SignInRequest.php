<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
        return [
            'login'    => 'required|string', // email or username
            'password' => 'required_without:social_id|string',
            'social_id'   => 'nullable|required_without:password|string|exists:users,social_id',
            'social_type' => 'nullable|required_with:social_id|string|in:google,facebook,apple'
        ];
    }
}
