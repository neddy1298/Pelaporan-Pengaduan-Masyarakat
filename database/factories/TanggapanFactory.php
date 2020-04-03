<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Faker\Generator as Faker;

$factory->define(Tanggapan::class, function (Faker $faker) {
    return [
        'id_pengaduan' => factory(Pengaduan::class)->create(),
        'tgl_tanggapan' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggapan' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'id_petugas' => factory(Petugas::class)->create(),
    ];
});
