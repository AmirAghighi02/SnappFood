<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->mergeIfMissing([
            'count' => '1'
        ]);
    }

    public function rules(): array
    {
        return [
            'food_id' => ['required', 'exists:food,id'],
            'count' => ['required', 'numeric', 'between:1,20']
        ];
    }


}
