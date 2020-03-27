<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pengaduan;
use App\Masyarakat;
use Faker\Generator as Faker;

$factory->define(Pengaduan::class, function (Faker $faker) {
    return [
        'tgl_pengaduan' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'nik' => factory(Masyarakat::class)->create()->nik,
        'isi_laporan' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'foto' => 'default.jpg',
        'status' => $faker->randomElement(['0', 'proses', 'selesai']),
    ];
});
