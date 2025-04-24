<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventDocuments extends Model
{
    use HasFactory;

    protected $table = 'event_documents';

    protected $fillable = [
        'events_id',
        'doc_name',
        'doc_description',
        'doc_file',
        'docx_file',
        'doc_agreement',
        'doc_sort',
        'is_visible'
    ];

    public function event(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }
}
