<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengaduan';

    protected $foreignKey = 'nik';

    protected $dates = ['tgl_pengaduan'];

    protected $fillable = [
        'tgl_pengaduan', 'nik', 'judul', 'isi_laporan', 'foto', 'status',
    ];

    public function masyarakat()
    {
        return $this->belongsTo('App\Models\Masyarakat');
    }
}
