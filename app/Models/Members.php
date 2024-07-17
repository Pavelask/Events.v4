<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'user_id',
        'events_id',
        'eventsName',
        'surName',
        'firstName',
        'middleName',
        'birthDate',
        'snils',
        'education',
        'contactPhone',
        'email',
        'job_title',
        'workPhone',
        'name_ppo',
        'name_to',
        'region',
        'note',
        'qr_code',
        'qr_code_pic',
        'confirmation',
        'agreement',
    ];

    public function userMember(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function memberEvent(): belongsTo
    {
        return $this->belongsTo(Events::class,'events_id', 'id');
    }

}
