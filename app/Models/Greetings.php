<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Greetings extends Model
{
    use HasFactory;

    protected $table = 'greetings';

    protected $fillable = [
        'events_id',
        'greetings_title',
        'greetings_subtitle',
        'greetings_image',
        'greetings_image_description',
        'greetings_text',
        'greetings_sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }
}
