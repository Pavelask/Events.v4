<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banners extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'events_id',
        'banner_name',
        'banner_image',
        'banner_url',
        'banner_sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }


}
