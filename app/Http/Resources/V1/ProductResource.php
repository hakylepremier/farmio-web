<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'price' => $this->price,
            'weight' => $this->weight,
            'category' => $this->category->name,
            'shopName' => $this->shop->name,
            'shopDescription' => $this->shop->description,
            'image' => asset('storage/' . $this->product_image),
        ];
    }
}
