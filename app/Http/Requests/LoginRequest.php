<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|max:255'
        ];
    }

    /**
     * @return array
     */
    public function data(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
