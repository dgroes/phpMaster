<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//  C01 - Sofdeletes
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $dates = ['deleted_at'];

    // C02 - Campos rellenables
    //Campos que son rellenables
    protected $fillable = [
        'nombres',
        'apellidos',
        'teléfono',
        'foto',
        'email',
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    //Campos ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // __RELACIONES__
    // C03 - Relaciones
    
    //Relación uno a muchos
    public function role(){
        return $this->belongsTo(Role::class, 'rol_id');
    }

    //Relación uno a muchos
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    //Relación uno a muchos
    public function ConsultantReservation(){
        return $this->hasMany(Reservation::class, 'consultant_id');
    }
}
