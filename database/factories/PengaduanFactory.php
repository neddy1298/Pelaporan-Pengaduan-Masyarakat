<?php

namespace Database\Factories;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengaduan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tgl_pengaduan' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'nik' => function () {
                return Masyarakat::inRandomOrder()->first()->nik;
            },
            'judul' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'isi_laporan' => $this->faker->paragraph,
            'foto' => 'default.jpg',
            'status' => $this->faker->randomElement(['0', 'proses', 'selesai']),
        ];
    }
}
