<?php

namespace App\Http\Requests\Candidate;

use App\Responses\SendRedirect;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class updateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            'name' => "nullable|string|max:255",
            'description' => "nullable|string",
            'external_link' => "nullable|string|url",
            'updated_by' => "nullable|string",
            'deleted_by' => "nullable|string"
        ];
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, SendRedirect::withMessage("candidate.update", false, $validator->getMessageBag()));
    }
}
