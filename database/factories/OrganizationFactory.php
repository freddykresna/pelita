<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $states = ['FL', 'GA', 'NY', 'PA'];

        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text(200),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $states[array_rand($states, 1)],
            'zip' => $this->faker->postcode,
            'country' => 'USA',
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl(640, 480, 'business', true, 'Organization Logo'),
            'established_date' => $this->faker->date(),
            'time_zone' => 'ET',
        ];
    }
}
