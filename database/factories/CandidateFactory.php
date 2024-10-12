<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidate_id' => $this->faker->unique()->uuid(),
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->firstName(),
            'description' => $this->faker->text(),
            'external_link' => $this->faker->url(),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
