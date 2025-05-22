<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Pasien::class;

    public function definition(): array
    {
        return [
            'nama_pasien' =>  fake()->name(),
            'alamat' => fake()->address(),
            'no_telepon' => '08' . fake()->numerify('#########'),
            'id_rumah_sakit' => RumahSakit::inRandomOrder()->first()->id,
        ];
    }
}