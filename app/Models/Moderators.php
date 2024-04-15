<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Moderators extends Model
{
    use HasFactory;

    protected $table = 'moderators';

    protected $fillable = [
        'events_id',
        'first_name',
        'middle_name',
        'last_name',
        'job_title',
        'image',
        'description',
        'moderator_sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }
}
