<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'surname' => 'required|string|min:3|max:100',
            'patronymic' => 'nullable|string|min:3|max:100',
            'floor' => 'nullable|string',
            'wage' => 'nullable|integer',
            'department' => 'required|array',
            'department*' => 'string'
        ];
    }
}
