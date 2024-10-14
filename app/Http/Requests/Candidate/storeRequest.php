<?php

namespace App\Http\Requests\Candidate;

use App\Responses\SendRedirect;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class storeRequest extends FormRequest
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
            'image' => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            'name' => "required|string|max:255",
            'description' => "required|string",
            'external_link' => "required|string|url",
        ];
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, SendRedirect::withMessage("candidates.create", false, $validator->getMessageBag()));
    }
}
