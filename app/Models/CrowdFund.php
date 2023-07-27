<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CrowdFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'amount',
        'period',
        'location',
        'crowd_category_id',
        'shop_id',
        'active',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'active' => true,
    ];

    public function crowdCategory(): BelongsTo
    {
        return $this->belongsTo(CrowdCategory::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }
}
