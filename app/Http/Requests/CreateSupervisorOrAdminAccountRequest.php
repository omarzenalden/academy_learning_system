<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupervisorOrAdminAccountRequest extends FormRequest
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
            'username'     => 'required|string|max:255|unique:users,username',
            'email'        => 'required|email|max:255|unique:users,email',
            'user_type'    => 'required|string|in:supervisor,admin',
            'password'     => 'required|string|min:8|confirmed',
            ];
    }
}
