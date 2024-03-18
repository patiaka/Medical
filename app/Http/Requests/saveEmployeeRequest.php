<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveEmployeeRequest extends FormRequest
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
            'staffId'=>'unique:employees,staffId',
            'firstName'=>'required',
            'lastName'=>'required',
            'birthDate'=>'required',
            'jobTitle'=>'required',
            'company'=>'required',
            'department_id'=>'required|unique:departments,id',
        ];
    }
}
