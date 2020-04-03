<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $foreignKey = 'nik';
    protected $fillable = [
        'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status',
    ];
}
