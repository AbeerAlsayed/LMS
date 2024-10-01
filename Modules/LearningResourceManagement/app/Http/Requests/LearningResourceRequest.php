<?php

namespace Modules\LearningResourceManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningResourceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'course_id' => 'sometimes|required|exists:courses,id',
            'type' => 'sometimes|required|string|max:50',
            'resource_url' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
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
