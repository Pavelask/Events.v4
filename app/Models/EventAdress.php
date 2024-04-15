<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventAdress extends Model
{
    use HasFactory;

    protected $table = 'event_adresses';

    protected $fillable = [
        'events_id',
        'contact_info',
        'city',
        'adress',
        'image_map',
        'map_code',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }
}
