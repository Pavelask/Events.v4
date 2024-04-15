<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGuestsTags extends Model
{
    use HasFactory;

    protected $table = 'event_guests_tags';

    protected $fillable = [
        'name',
        'slug',
        'tags_sort',
        'is_visible'
    ];
}
