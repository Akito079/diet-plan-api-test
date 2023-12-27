<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'tags' => $this->tags,
            'image' => $this->image,
            'price' => $this->price,
            'rating' => $this->rating,
            'reviewCount' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}
