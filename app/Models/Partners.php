<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partners extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'events_id',
        'title',
        'logo',
        'description',
        'sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }

}
