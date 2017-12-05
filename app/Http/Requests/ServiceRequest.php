<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'doctor_id' => 'required',
            'employee_id' => 'required',
            'company_id' => 'required',
            'exam_date' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'doctor_id.required' => 'Médico é um campo obrigatório',
            'employee_id.required' => 'Funcionário é um campo obrigatório',
            'company_id.required' => 'Empresa é um campo obrigatório',
            'exam_date.required' => 'Data é um campo obrigatório',
        ];
    }
}
