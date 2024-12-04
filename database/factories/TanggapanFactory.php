<?php

namespace Database\Factories;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanggapan>
 */
class TanggapanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tanggapan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pengaduan' => function () {
                return Pengaduan::inRandomOrder()->first()->id_pengaduan;
            },
            'tgl_tanggapan' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'tanggapan' => $this->faker->paragraph,
            'id_petugas' => function () {
                return Petugas::inRandomOrder()->first()->id_petugas;
            },
        ];
    }
}
