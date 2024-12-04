<?php

namespace Database\Factories;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masyarakat>
 */
class MasyarakatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Masyarakat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->unique()->numerify('##############'),
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->userName,
            'password' => bcrypt('password'),
            'telp' => $this->faker->numerify('08##########'),
            'active' => $this->faker->randomElement([0, 1]),
        ];
    }
}
