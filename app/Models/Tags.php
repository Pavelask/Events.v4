<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug',
        'tags_sort',
        'is_visible'
    ];
    public function organizers(): BelongsToMany
    {
        return $this->belongsToMany(Organizers::class, 'organizers_tags','tags_id', 'organizers_id');
    }
}
