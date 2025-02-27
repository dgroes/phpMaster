<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; /* C20: Notifiación de BD */

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    //  C06: Agregar los campos al $fillable en el modelo User
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* C04: Agregar nueva sección al formulario con una relación */

    // Creación de la relación entre usuario y country
    public function country(){
        return $this->belongsTo(Country::class);
    }

    /* C10: Tablas Pivote */
    //Realación entre Usuario y Calendario (De muchos a muchos)
    public function calendars(){
        return $this->belongsToMany(Calendar::class);
    }

    /* C10: Tablas Pivote */
    //Realación entre Usuario y Departamento (De muchos a muchos)
    public function departaments(){
        return $this->belongsToMany(Departament::class);
    }

    //Relación entre Usuario y Estado (De uno a muchos)
    public function holidays(){
        return $this->hasMany(Holiday::class);
    }

    //Relación entre Usuario y Estado (De uno a muchos)
    public function timesheets(){
        return $this->hasMany(Timesheet::class);
    }
}
