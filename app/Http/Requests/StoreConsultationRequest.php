<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'employee_id' => 'required|exists:employees,id',
            'injurie_id' => 'required|exists:injuries,id',
            'medication_id' => 'required|exists:medications,id',
            'diagnose_id' => 'required|exists:diagnoses,id',
            'staffType' => 'required|string|max:255',
            'referral' => 'required|string|max:255',
            'history' => 'required|string',
            'bp' => 'required|integer|max:255',
            'pulse' => 'required|integer',
            'temperature' => 'required|integer',
            'observation' => 'required',
            'comments' => 'required',
            'malaria' => 'required|string|max:255',
            'daysOff' => 'required|integer',
        ];
    }

    protected function prepareForValidation()
    {

        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        return toastr()->error('la validation a echoué verifiez vos informations!');
    }
}
