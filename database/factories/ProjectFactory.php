<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => '1',
            // 'type_id' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            // 'community_id' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            // 'created_by' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            // 'category_id' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            // 'location_id' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            // 'emirate_id' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            'property_release_id' => $this->faker->randomElement(['1', '0', '2', '2', '4', '5']),
            'slug_link' => $this->faker->url(),
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'ownership' => $this->faker->name(),
            'handover' => $this->faker->dateTime(),
            'starting_price' => $this->faker->randomNumber(2),
            'meta_title' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
            'meta_keywords' => $this->faker->sentence(),
            'latitude' => $this->faker->randomNumber(2),
            'longitude' => $this->faker->randomNumber(2),
            'no_of_units' => $this->faker->randomNumber(2),
            'bedrooms' => $this->faker->randomNumber(2),
            'bathrooms' => $this->faker->randomNumber(2),
            'floors' => $this->faker->randomNumber(2),
            'unit_size_range' => $this->faker->randomNumber(2),
            'outdoor_area' => $this->faker->randomNumber(2),
            'terrace_area' => $this->faker->randomNumber(2),
            'escrow' => $this->faker->randomNumber(2),
        ];
    }
}
