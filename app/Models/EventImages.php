<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventImages extends Model
{
    use HasFactory;

    protected $table = 'event_images';

    protected $fillable = [
        'events_id',
        'image_name',
        'image_file',
        'image_sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }
}
