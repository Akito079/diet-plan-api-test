<?php

namespace App\Http\Resources;

use App\Models\Meal;
use Illuminate\Support\Arr;
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
        // $ratingArr = Arr::pluck($this->reviews,'rating');
        // dd($ratingArr);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'tags' => $this->tags,
            'image' => $this->image,
            'price' => $this->price,
            'rating' => $this->reviews()->avg('rating'),
            'createdDate' => date_format($this->created_at,'d M Y | h:i A '),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }
}
