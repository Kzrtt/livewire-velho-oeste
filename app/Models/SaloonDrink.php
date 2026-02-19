<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaloonDrink extends Model
{
    use HasFactory;

    protected $primaryKey = 'sdk_id';

    const CREATED_AT = 'sdk_created_at';
    const UPDATED_AT = 'sdk_updated_at';

    protected $fillable = [
        'sdk_name',
        'sdk_type',
        'sdk_price',
        'sdk_alcoholic',
        'sdk_available',
    ];

    protected $casts = [
        'sdk_price' => 'decimal:2',
        'sdk_alcoholic' => 'boolean',
        'sdk_available' => 'boolean',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(SaloonOrder::class, 'saloon_drink_sdk_id', 'sdk_id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('sdk_available', true);
    }

    public function scopeAlcoholic($query)
    {
        return $query->where('sdk_alcoholic', true);
    }
}
