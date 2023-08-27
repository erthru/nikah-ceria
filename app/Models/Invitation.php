<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'header',
        'male_name',
        'female_name',
        'male_father_name',
        'male_mother_name',
        'female_father_name',
        'female_mother_name',
        'male_family_order',
        'female_family_order',
        'male_photo',
        'female_photo',
        'caption_1',
        'caption_2',
        'gallery_1',
        'gallery_2',
        'gallery_3',
        'gallery_4',
        'gallery_5',
        'gallery_6',
        'gallery_7',
        'gallery_8',
        'youtube_url',
        'song',
        'is_published',
        'product_id',
        'customer_id',
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
