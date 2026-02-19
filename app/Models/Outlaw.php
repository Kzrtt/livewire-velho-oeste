<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outlaw extends Model
{
    use HasFactory;

    protected $primaryKey = 'otl_id';

    const CREATED_AT = 'otl_created_at';
    const UPDATED_AT = 'otl_updated_at';

    protected $fillable = [
        'gang_gng_id',
        'otl_name',
        'otl_alias',
        'otl_bounty',
        'otl_crime',
        'otl_status',
        'otl_danger_level',
        'otl_last_seen_at',
    ];

    protected $casts = [
        'otl_bounty' => 'decimal:2',
        'otl_last_seen_at' => 'datetime',
    ];

    public function gang(): BelongsTo
    {
        return $this->belongsTo(Gang::class, 'gang_gng_id', 'gng_id');
    }

    public function horses(): HasMany
    {
        return $this->hasMany(Horse::class, 'outlaw_otl_id', 'otl_id');
    }

    public function saloonOrders(): HasMany
    {
        return $this->hasMany(SaloonOrder::class, 'outlaw_otl_id', 'otl_id');
    }

    public function sheriffReports(): HasMany
    {
        return $this->hasMany(SheriffReport::class, 'outlaw_otl_id', 'otl_id');
    }

    public function townEvents(): HasMany
    {
        return $this->hasMany(TownEvent::class, 'outlaw_otl_id', 'otl_id');
    }

    public function scopeWanted($query)
    {
        return $query->where('otl_status', 'wanted');
    }

    public function scopeCaptured($query)
    {
        return $query->where('otl_status', 'captured');
    }

    public function scopeEscaped($query)
    {
        return $query->where('otl_status', 'escaped');
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('otl_name', 'like', "%{$term}%")
              ->orWhere('otl_alias', 'like', "%{$term}%")
              ->orWhere('otl_crime', 'like', "%{$term}%");
        });
    }
}
