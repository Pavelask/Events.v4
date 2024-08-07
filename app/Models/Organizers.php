<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organizers extends Model
{
    use HasFactory;

    protected $table = 'organizers';

    protected $fillable = [
        'events_id',
        'first_name',
        'middle_name',
        'last_name',
        'fullname',
        'job_title',
        'image',
        'description',
        'sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }

    public function getTags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'organizers_tags', 'organizers_id','tags_id');
    }

}
