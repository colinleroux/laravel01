<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;




class StoreGenreAPIRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:32',
                'unique:App\Models\Genre,name',
            ],
            'description' => [
                'nullable',
            ],
            'uuid' => [
                'nullable',
            ]
        ];
    }
        public function failedValidation(Validator $validator, $code=400)
        {
            throw new \HttpResponseException(
                response()->json(
                    [
                    'success' => false,
                    'message' => 'Validation errors',
                    'data' => $validator->errors(),
                     ])

            );
        }

    public function messages(): array
    {
        return [
            'name.required' => 'The genre name is required',
            'name.min' => 'The genre name min 3',
            'name.max' => 'The genre name max 32',
            'name.unique'=> 'That genre has been added previously',
            ];

    }
}
