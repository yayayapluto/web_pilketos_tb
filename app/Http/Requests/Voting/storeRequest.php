<?php

namespace App\Http\Requests\Voting;

use App\Responses\SendRedirect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class storeRequest extends FormRequest
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
            'nisn' => "required|string",
            'candidate_id' => "required|uuid|exists:candidates,candidate_id",
            'name' => "nullable|string",
            'class' => "nullable|string"
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, SendRedirect::withMessage("voting", false, $validator->errors()));
    }
}
