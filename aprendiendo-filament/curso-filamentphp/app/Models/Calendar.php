<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    //Rellenado de campos

    //Opción en entornos de desarrollo
    protected $guarded = [];

    //Opción en entornos de producción
    /* protected $fillable = [
        'name',
        'year',
        'active',
    ]; */
}
