<?php

namespace Modules\TeacherManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $teacher->user->id,
            'password' => 'sometimes|nullable|string|min:8',
            'department' => 'sometimes|required|string|max:255',
            'hire_date' => 'sometimes|required|date',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
