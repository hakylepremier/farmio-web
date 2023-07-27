<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CrowdFundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $contributions = $this->whenAggregated('contributions', 'contribution', 'sum') ? $this->whenAggregated('contributions', 'contribution', 'sum') : 0;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => asset('storage/' . $this->image),
            'amount' => $this->amount,
            'contributions' => $this->contributions->sum('contribution'),
            'period' => $this->period,
            'location' => $this->location,
            'categoryName' => $this->crowdCategory->name,
            'shopName' => $this->shop->name,
            'shopDescription' => $this->shop->description,
            'active' => $this->active,
        ];
    }
}
