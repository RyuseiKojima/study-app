<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassificationUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
        ];
    }
}
