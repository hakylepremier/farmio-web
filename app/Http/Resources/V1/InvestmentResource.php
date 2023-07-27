<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource
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
            'image' => asset('storage/' . $this->image),
            'amount' => $this->amount,
            'roi' => $this->roi,
            'investorNumber' => $this->investor_number,
            'cycle' => $this->cycle,
            'maturityDate' => $this->maturity_date,
            'closingDate' => $this->closing_date,
            'investmetType' => $this->investment_type,
            'insurancePartner' => $this->insuranceCompany->name,
            'shopName' => $this->shop->name,
            'shopDescription' => $this->shop->description,
            'location' => $this->location,
            'active' => $this->active,
        ];
    }
}
