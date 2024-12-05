<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Esto elimina la protección de SQL Inyection, No hacer esto en producctión
    protected $guarded = ['*'];

    //!!Nunca eliminar la protecición de SQL Inyection en para Producción¡¡
    /* protected $fillable = [
        'user_id',
        'text',
    ];

    protected $hidden = [
        'user_id'
    ]; */
}
