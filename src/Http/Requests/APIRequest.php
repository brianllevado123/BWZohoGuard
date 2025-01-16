<?php

namespace brianllevado123\BWZohoGuard\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class APIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'bw_api_endpoint' => 'required|string',
            'bw_request_method' => 'required|string|in:post,get,put,delete',
            'bw_request_payload' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'bw_api_endpoint.required' => 'The endpoint is required.',
            'bw_api_endpoint.string' => 'The endpoint must be a string.',
            'bw_request_method.required' => 'The request method is required.',
            'bw_request_method.string' => 'The request method must be a string.',
            'bw_request_method.in' => 'The request method must be one of the following: post, get, put, delete.',
            'bw_request_payload.required' => 'The payload is required.',
            'bw_request_payload.array' => 'The payload must be an array.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
