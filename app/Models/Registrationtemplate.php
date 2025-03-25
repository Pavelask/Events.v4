<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrationtemplate extends Model
{
    use HasFactory;

    protected $table = 'registrationtemplates';

    protected $fillable = [
        'template_name',
        'description',
        'sort',
        'is_visible'
    ];

    protected $attributes = [
        'sort' => '500',
    ];
}
