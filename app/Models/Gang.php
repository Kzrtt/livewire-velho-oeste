<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gang extends Model
{
    use HasFactory;

    protected $primaryKey = 'gng_id';

    const CREATED_AT = 'gng_created_at';
    const UPDATED_AT = 'gng_updated_at';

    protected $fillable = [
        'gng_name',
        'gng_territory',
        'gng_reputation',
        'gng_active',
    ];

    protected $casts = [
        'gng_active' => 'boolean',
    ];

    public function outlaws(): HasMany
    {
        return $this->hasMany(Outlaw::class, 'gang_gng_id', 'gng_id');
    }

    public function scopeActive($query)
    {
        return $query->where('gng_active', true);
    }
}
