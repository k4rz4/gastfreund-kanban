<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ];
    }
}
