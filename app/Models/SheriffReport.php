<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SheriffReport extends Model
{
    use HasFactory;

    protected $primaryKey = 'shr_id';

    const CREATED_AT = 'shr_created_at';
    const UPDATED_AT = 'shr_updated_at';

    protected $fillable = [
        'outlaw_otl_id',
        'bounty_hunter_bht_id',
        'shr_title',
        'shr_description',
        'shr_type',
        'shr_location',
        'shr_resolved',
        'shr_reported_at',
    ];

    protected $casts = [
        'shr_resolved' => 'boolean',
        'shr_reported_at' => 'datetime',
    ];

    public function outlaw(): BelongsTo
    {
        return $this->belongsTo(Outlaw::class, 'outlaw_otl_id', 'otl_id');
    }

    public function hunter(): BelongsTo
    {
        return $this->belongsTo(BountyHunter::class, 'bounty_hunter_bht_id', 'bht_id');
    }

    public function scopeUnresolved($query)
    {
        return $query->where('shr_resolved', false);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('shr_reported_at', 'desc');
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('shr_type', $type);
    }
}
