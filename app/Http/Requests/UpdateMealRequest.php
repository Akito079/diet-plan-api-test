<?php

namespace App\Http\Requests;

use App\Models\Meal;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMealRequest extends FormRequest
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
        $method = $this->method();
       if($method == 'PUT'){
        return [
            'name' =>['required','min:5',  Rule::unique('meals','name')->ignore($this->meal)],
            'description' => ['required','min:5'],
            'tags' =>  ['min:5'],
            'image' =>[ 'mimes:png,jpeg,jpg,webp','file'],
            'price' => ['required'],
            'reviewCount' => ['integer'],
            'rating' => ['integer'],
        ];
       }else{
        return [
            'name' =>['sometimes','required','min:5','unique:meals,name' ],
            'description' => ['sometimes','required','min:5'],
            'tags' =>  ['sometimes','min:5'],
            'image' =>[ 'sometimes','mimes:png,jpeg,jpg,webp','file'],
            'price' => ['sometimes','required'],
            'reviewCount' => ['sometimes','integer'],
            'rating' => ['sometimes','integer'],
        ];
       }
    }
    protected function prepareForValidation(){
        if($this->reviewCount){
            $this->merge([
                'review_count' => $this->reviewCount,
            ]);
        }
    }
}
