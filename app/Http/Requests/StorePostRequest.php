<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    protected function failedValidation(Validator $validator){
        if($this->is('api/*')){
            $response = ApiResponse::send(422, 'Validation Errors', $validator->errors());

            throw new ValidationException($validator, $response);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => ['required', 'min:3', 'max:35'],
            'body' => ['required', 'min:3', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail' => ['required'],
        ];
    }


}
