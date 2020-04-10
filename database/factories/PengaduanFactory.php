<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Faker\Generator as Faker;

$factory->define(Pengaduan::class, function (Faker $faker) {
    $masyarakat = Masyarakat::pluck('nik')->toArray();
    return [
        'tgl_pengaduan' => $faker->dateTimeThisDecade($max = 'now', $timezone = 'Asia/Jakarta'),
        'nik' => $faker->randomElement($masyarakat),
        'judul' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'isi_laporan' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'foto' => 'default.jpg',
        'status' => $faker->randomElement(['0', 'proses', 'selesai']),
    ];
});
