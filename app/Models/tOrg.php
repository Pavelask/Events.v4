<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tOrg extends Model
{
    use HasFactory;

    protected $table = 't_orgs';

    protected $fillable = [
        'name',
        'code',
        'description',
        'sort',
        'is_visible',
    ];
}
