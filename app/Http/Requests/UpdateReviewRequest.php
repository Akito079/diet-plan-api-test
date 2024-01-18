<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   $method = $this->method();

       if($method == 'PUT'){
        return [
            'customer_id' => ['required'],
            'meal_id' => ['required'],
            'message' => ['required','min:5'],
            'raing' => ['required'],
        ];
       }else{
        return [
            'customerId' => ['sometimes','required'],
            'mealId' => ['sometimes','required'],
            'message' => ['sometimes','required','min:5'],
            'raing' => ['sometimes','required'],
        ];
       }

    }
    protected function prepareForValidation(){
        $this->merge([
            'customer_id' => $this->customerId,
            'meal_id' => $this->mealId,
        ]);
    }
}
