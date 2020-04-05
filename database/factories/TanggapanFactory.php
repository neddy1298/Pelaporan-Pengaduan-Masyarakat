<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Faker\Generator as Faker;

$factory->define(Tanggapan::class, function (Faker $faker) {
    $pengaduan = Pengaduan::pluck('id_pengaduan')->toArray();
    $petugas = Petugas::pluck('id_petugas')->toArray();
    return [
        'id_pengaduan' => $faker->randomElement($pengaduan),
        'tgl_tanggapan' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggapan' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'id_petugas' => $faker->randomElement($petugas),
    ];
});
