<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgronomistResource extends JsonResource
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
            'name' => $this->user->name,
            'expertise' => $this->expertise->name,
            'experienceStartDate' => $this->experience_start_date,
            'description' => $this->description,
            'phone' => $this->phone,
            'image' => asset('storage/' . $this->image),
        ];
    }
}
