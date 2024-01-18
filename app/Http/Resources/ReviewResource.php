<?php

namespace App\Http\Resources;

use App\Models\Review;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customerId' => $this->customer_id,
            'customer' => Review::find($this->id)->customers->name,
            'mealId' => $this->meal_id,
            'message' => $this->message,
            'rating' => $this->rating,
        ];
    }
}
