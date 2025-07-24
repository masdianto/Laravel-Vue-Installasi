<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // We'll handle authorization using middleware
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $employeeId = $this->route('employee')->id;

        return [
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employeeId,
            'position' => 'required',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ];
    }
}
