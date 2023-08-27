<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationGift extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank',
        'account_holder',
        'account_number',
        'invitation_id'
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
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
