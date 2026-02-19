<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaloonOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'sor_id';

    const CREATED_AT = 'sor_created_at';
    const UPDATED_AT = 'sor_updated_at';

    protected $fillable = [
        'outlaw_otl_id',
        'saloon_drink_sdk_id',
        'sor_customer_name',
        'sor_quantity',
        'sor_total_price',
        'sor_status',
        'sor_notes',
    ];

    protected $casts = [
        'sor_total_price' => 'decimal:2',
    ];

    public function outlaw(): BelongsTo
    {
        return $this->belongsTo(Outlaw::class, 'outlaw_otl_id', 'otl_id');
    }

    public function drink(): BelongsTo
    {
        return $this->belongsTo(SaloonDrink::class, 'saloon_drink_sdk_id', 'sdk_id');
    }

    public function scopePending($query)
    {
        return $query->where('sor_status', 'pending');
    }

    public function scopeServed($query)
    {
        return $query->where('sor_status', 'served');
    }
}
