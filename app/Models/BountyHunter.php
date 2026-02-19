<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BountyHunter extends Model
{
    use HasFactory;

    protected $primaryKey = 'bht_id';

    const CREATED_AT = 'bht_created_at';
    const UPDATED_AT = 'bht_updated_at';

    protected $fillable = [
        'bht_name',
        'bht_alias',
        'bht_success_rate',
        'bht_captures',
        'bht_active',
    ];

    protected $casts = [
        'bht_success_rate' => 'decimal:2',
        'bht_active' => 'boolean',
    ];

    public function sheriffReports(): HasMany
    {
        return $this->hasMany(SheriffReport::class, 'bounty_hunter_bht_id', 'bht_id');
    }

    public function scopeActive($query)
    {
        return $query->where('bht_active', true);
    }
}
