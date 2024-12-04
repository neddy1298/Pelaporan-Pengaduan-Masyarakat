<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $foreignKey = 'id_petugas';

    protected $dates = ['tgl_tanggapan'];

    protected $fillable = [
        'id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas',
    ];

    public function petugas()
    {
        return $this->hasManyThrough('App\Models\Petugas', App\Models\Tanggapan);
    }
}
