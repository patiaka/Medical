<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class saveDepartmentRequest extends FormRequest
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
            //
            'department_name' => 'required|unique:departments,name',
        ];
    }

    public function messages()
    {
        return [
            'department_name' => 'The department name is required',
            'department_name' => 'Department name already exist',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return toastr()->error('la validation a echoué verifiez vos informations!');
    }
}
