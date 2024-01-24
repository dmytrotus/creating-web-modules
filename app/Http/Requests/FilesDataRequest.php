<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilesDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'selected_module' => 'required|string',
            'clickout' => 'required|string',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'position_x' => 'required|integer',
            'position_y' => 'required|integer',
            'background' => 'nullable|string'
        ];
    }
}
