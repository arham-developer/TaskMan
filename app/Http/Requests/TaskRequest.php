<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_public'   => '',
            'title'       => 'required|min:6|max:255|unique:tasks,title,'.$this->uuid,
            'description' => '',
            'priority'    => 'required|in:high,medium,low',
            'unit_id'     => 'required',
            'parent_id'   => '',
        ];
    }
}
