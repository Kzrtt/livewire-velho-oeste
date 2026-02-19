<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horse extends Model
{
    use HasFactory;

    protected $primaryKey = 'hrs_id';

    const CREATED_AT = 'hrs_created_at';
    const UPDATED_AT = 'hrs_updated_at';

    protected $fillable = [
        'outlaw_otl_id',
        'hrs_name',
        'hrs_breed',
        'hrs_color',
        'hrs_speed',
        'hrs_stolen',
    ];

    protected $casts = [
        'hrs_stolen' => 'boolean',
    ];

    public function outlaw(): BelongsTo
    {
        return $this->belongsTo(Outlaw::class, 'outlaw_otl_id', 'otl_id');
    }

    public function scopeStolen($query)
    {
        return $query->where('hrs_stolen', true);
    }

    public function scopeFast($query)
    {
        return $query->where('hrs_speed', '>=', 8);
    }
}
