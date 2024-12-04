<?php

namespace App\Models;

use App\Notifications\MasyarakatResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'masyarakat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 'nama', 'email', 'username', 'password', 'telp', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengaduan()
    {
        return $this->hasMany('App\Models\Pengaduan');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MasyarakatResetPasswordNotification($token));
    }
}
