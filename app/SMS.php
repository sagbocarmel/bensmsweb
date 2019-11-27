<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable = [
        'sms_sender', 'sms_receiver', 'student_matricule', 'student_level', 'sms_value',
        'sms_send_date', 'sms_send_time', 'nbr_page_sms', 'sms_price', 'sms_state',
        'sms_school_user_id',
    ];
}
