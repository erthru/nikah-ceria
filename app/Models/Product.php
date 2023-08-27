<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'thumbnail',
        'price',
        'discount',
        'discount_expires_at',
        'demo_url',
        'is_active'
    ];

    public function getDiscountExpiresAtAttribute($date): String
    {
        return $date ? Carbon::parse($date)->format('d/m/Y H:i:s') : '';
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
