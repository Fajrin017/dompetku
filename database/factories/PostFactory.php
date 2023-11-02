<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'mak' => $this->faker->sentence(mt_rand(1,3)),
            'output' => $this->faker->sentence(mt_rand(2,5)),
            'jenis_realisasi' => $this->faker->sentence(mt_rand(1,2)),
            'no_dokumen' => $this->faker->sentence(mt_rand(2,3)),
            'nilai_realisasi' => $this->faker->randomDigit(),
            'tgl_realisasi' => $this->faker->date('Y_m_d'),
            'mekanisme' => $this->faker->sentence(mt_rand(1,2)),
            'penyedia' => $this->faker->name(),
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,3)

        ];
    }
}
