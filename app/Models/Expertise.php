<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expertise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
    ];

    public function agronomists(): HasMany
    {
        return $this->hasMany(Agronomist::class);
    }
}
