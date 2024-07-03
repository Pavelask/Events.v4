<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($events) {
            $events->{$events->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()

    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected $fillable = [
        'name',
        'event_banner_logo',
        'description',
        'date_start',
        'date_end',
        'fulldate',
        'event_type',
        'event_status',
        'event_agreement',
        'youtube_link',
        'is_visible',
        'is_passport',
        'is_registration',
        'event_sort'
    ];

    public function eventType(): hasOne
    {
        return $this->hasOne(event_types::class, 'id', 'id');
    }

    public function moderators(): hasMany
    {
        return $this->hasMany(Moderators::class, 'events_id', 'id');
    }

    public function guests(): hasMany
    {
        return $this->hasMany(Guests::class, 'events_id', 'id')->orderBy('guests_sort', 'ASC');
    }

    public function organizers(): hasMany
    {
        return $this->hasMany(Organizers::class, 'events_id', 'id');
    }

    public function partners(): hasMany
    {
        return $this->hasMany(Partners::class, 'events_id', 'id');
    }

    public function banners(): hasMany
    {
        return $this->hasMany(Banners::class, 'events_id', 'id');
    }

    public function greetings(): hasMany
    {
        return $this->hasMany(Greetings::class, 'events_id', 'id');
    }

    public function getAdress(): hasMany
    {
        return $this->hasMany(EventAdress::class, 'events_id', 'id');
    }

    public function getSchedules(): hasMany
    {
        return $this->hasMany(EventSchedules::class, 'events_id', 'id');
    }

    public function eventsDocumen(): hasMany
    {
        return $this->hasMany(EventDocuments::class, 'events_id', 'id');
    }


    public function timetablesEvent(): HasManyThrough
    {
        return $this->hasManyThrough(
            EventTimetables::class,
            EventSchedules::class,
            'events_id', // Foreign key on the events_id table...
            'event_schedules_id', // Foreign key on the events_id table...
            'id', // Local key on the events_id table...
            'id' // Local key on the schedule_id table...
        );
    }

    public function eventsImage(): hasMany
    {
        return $this->hasMany(EventImages::class, 'events_id', 'id');
    }


    public function eventMembers(): hasMany
    {
        return $this->hasMany(Members::class, 'events_id', 'id');
    }
}
