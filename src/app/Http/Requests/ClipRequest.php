<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClipRequest extends FormRequest
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
            'site' => ['required'],
            'category' => ['required'],
            'user_id' => ['required'],
            'memo' => ['required'],
        ];
    }
}
