<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //Campos rellenables
    protected $filliable = ['name'];

    //Relacion con usuarios (uno a muchos)
    public function users(){
        return $this->hasMany(User::class, 'rol_id');
    }
}
