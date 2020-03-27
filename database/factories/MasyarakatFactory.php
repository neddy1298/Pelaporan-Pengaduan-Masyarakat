<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Masyarakat;
use Faker\Generator as Faker;

$factory->define(Masyarakat::class, function (Faker $faker) {
    return [
        'nik' => $faker->unique()->bothify('IND###?###??##?#'),
        'nama' => $faker->name,
        'username' => $faker->username,
        'password' => $faker->password,
        'telp' => $faker->numerify('08##########')
    ];
});
