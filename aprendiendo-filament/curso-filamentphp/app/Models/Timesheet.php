<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos inversa
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
}
