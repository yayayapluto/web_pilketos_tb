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
            'voting_id' => "required|uuid|unique:votings,voting_id",
            'nisn' => "required|string|digits:10",
            'candidate_id' => "required|uuid|exists:candidate,candidate_id",
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, SendRedirect::withMessage("candidate.update", false, $validator->getMessageBag()));
    }
}
