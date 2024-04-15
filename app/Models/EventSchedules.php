<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventSchedules extends Model
{
    use HasFactory;

    protected $table = 'event_schedules';

    protected $fillable = [
        'events_id',
        'week',
        'date',
        'alt_data',
        'description',
        'sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }

    public function timetable(): HasMany
    {
        return $this->hasMany(EventTimetables::class, 'event_schedules_id', 'id');
    }
}
