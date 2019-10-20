<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsSchool extends Model
{
    public function smss()
    {
        return $this->hasMany('\App\SMS');
    }
}
