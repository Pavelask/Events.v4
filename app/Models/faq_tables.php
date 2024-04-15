<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq_tables extends Model
{
    use HasFactory;

    protected $table = 'faq_tables';

    protected $fillable = [
        'question',
        'answer',
        'sort',
        'is_visible'
    ];


}
