<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $foreignKey = 'nik';
    protected $dates = ['tgl_pengaduan'];
    protected $fillable = [
        'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status',
    ];

    public function masyarakat()
    {
        return $this->belongsTo('App\Models\Masyarakat');
    }
}
