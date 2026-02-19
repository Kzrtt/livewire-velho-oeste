<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TownEvent extends Model
{
    use HasFactory;

    protected $primaryKey = 'tev_id';

    const CREATED_AT = 'tev_created_at';
    const UPDATED_AT = 'tev_updated_at';

    protected $fillable = [
        'outlaw_otl_id',
        'tev_title',
        'tev_description',
        'tev_type',
        'tev_location',
        'tev_severity',
        'tev_resolved',
        'tev_happened_at',
    ];

    protected $casts = [
        'tev_resolved' => 'boolean',
        'tev_happened_at' => 'datetime',
    ];

    public function outlaw(): BelongsTo
    {
        return $this->belongsTo(Outlaw::class, 'outlaw_otl_id', 'otl_id');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('tev_happened_at', 'desc');
    }

    public function scopeBySeverity($query, string $severity)
    {
        return $query->where('tev_severity', $severity);
    }

    public function scopeUnresolved($query)
    {
        return $query->where('tev_resolved', false);
    }
}
