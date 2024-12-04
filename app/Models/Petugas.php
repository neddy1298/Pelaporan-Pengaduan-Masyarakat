<?php

namespace App\Models;

use App\Notifications\PetugasResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'petugas';

    protected $primaryKey = 'id_petugas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_petugas', 'email', 'username', 'password', 'telp', 'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tanggapan()
    {
        return $this->hasMany('App\Models\Tanggapan');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PetugasResetPasswordNotification($token));
    }
}
