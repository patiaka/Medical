<?php

namespace App\Http\Requests;

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
            'staffType' => 'required|string|max:255',
            'referral' => 'required|string|max:255',
            'diagnosis' => 'required|string|max:255',
            'history' => 'required|string',
            'bp' => 'required|string|max:255',
            'pulse' => 'required|integer',
            'temperature' => 'required|integer',
            'observation' => 'required',
            'comments' => 'required',
            'malaria' => 'required|string|max:255',
            'daysOff' => 'required|integer',
            'diagnosispec' => 'required',
            'diagnosiMali' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
       
       $this->merge( [
            'user_id' => auth()->user()->id,
        ]);
    }
}
