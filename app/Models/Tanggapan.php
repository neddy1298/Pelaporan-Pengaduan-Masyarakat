<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $foreignKey = 'id_petugas';
    protected $fillable = [
        'id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas',
    ];
}
