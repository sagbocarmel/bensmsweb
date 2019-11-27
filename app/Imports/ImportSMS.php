<?php

namespace App\Imports;

use App\SMS;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSMS implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dateTime = Carbon::now()->addMinutes(90);

        return new SMS([
            'sms_sender'     => $row[0],
            'sms_receiver'    => $row[1],
            'student_matricule' => $row[2],
            'student_level'    => $row[3],
            'sms_value'     => $row[4],
            'sms_send_date'    => $dateTime->format('Y-m-d'),
            'sms_send_time'     => $dateTime->format('H:i:s'),
            'sms_state'    => 6,
            'sms_school_user_id' => Auth::user()->id,
        ]);
    }
}
