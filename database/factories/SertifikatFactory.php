<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sertifikat>
 */
class SertifikatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [



            'name' => $this->faker->name,
            'url_qrcode' => $this->faker->url,
            'nomor_sertifikat' => $this->faker->phoneNumber,
            'sebagai' => $this->faker->name,
            'tanggal' => $this->faker->date,
            'keterangan' => $this->faker->text,
            ];
          
    }
}