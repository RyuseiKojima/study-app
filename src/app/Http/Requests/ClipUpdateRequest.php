<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClipUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'url' => ['required'],
            'site_id' => ['required'],
            'user_id' => ['required'],
            'category_id' => [],
            'memo' => [],
        ];
    }
}
