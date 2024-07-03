<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class EventTimetables extends Model
{
    use HasFactory;

    protected $table = 'event_timetables';

    protected $fillable = [
        'event_schedules_id',
        'event_id',
        'time',
        'place',
        'title',
        'description',
        'image',
        'sort',
        'is_visible'
    ];

    public function scheduleTable(): belongsTo
    {
        return $this->belongsTo(EventSchedules::class,'event_schedules_id', 'id');
    }

    public function eventTimetable(): HasOneThrough
    {
        return $this->hasOneThrough(
            Events::class,
            EventSchedules::class,
            'id',
            'id',
            'event_schedules_id',
            'events_id');
    }
}
