<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_at',
        'place',
        'address',
        'latitude',
        'longitude',
        'invitation_id'
    ];

    public function getEventAtAttribute($date): String
    {
        return $date ? Carbon::parse($date)->format('d/m/Y H:i:s') : '';
    }

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
