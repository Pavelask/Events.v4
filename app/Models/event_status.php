<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_status extends Model
{
    use HasFactory;

    protected $table = 'event_statuses';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort',
        'is_visible'
    ];

    protected $attributes = [
        'sort' => '500',
    ];
}
