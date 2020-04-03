<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Petugas;
use Faker\Generator as Faker;

$factory->define(Petugas::class, function (Faker $faker) {
    return [
        'nama_petugas' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->username,
        'password' => $faker->password,
        'telp' => $faker->numerify('08##########'),
        'level' => $faker->randomElement(['admin', 'petugas']),
    ];
});
