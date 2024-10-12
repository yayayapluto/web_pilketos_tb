<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VotingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voting_id' => $this->faker->unique()->uuid(),
            "nisn" => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'candidate_id' => Candidate::inRandomOrder()->first()->candidate_id,
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
