<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'status',
        'transfer_proof',
        'final_price',
        'payment_method',
        'product_id',
        'customer_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getCreatedAtAttribute($date): String
    {
        return Carbon::parse($date)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute($date): String
    {
        return Carbon::parse($date)->format('d/m/Y H:i:s');
    }
}
