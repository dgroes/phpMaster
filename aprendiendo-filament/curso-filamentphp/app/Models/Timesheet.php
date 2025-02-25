<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{

    ///Rellenado de campos

    //Opción en entornos de desarrollo
    protected $guarded = [];

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
