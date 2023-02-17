<?php

namespace App\Http\Requests\Interest;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class InterestRequest
 * @package App\Http\Requests
 */
class InterestRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
