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
            'name' => 'Test Organization',
            'description' => 'A test organization',
            'address' => '123 Test St',
            'city' => 'Test City',
            'state' => 'NY',
            'zip' => '12345',
            'country' => 'USA',
            'phone' => '555-123-4567',
            'email' => 'test@example.com',
            'website' => 'https://example.com',
            'logo' => 'test-logo.png',
            'established_date' => '2020-01-01',
            'time_zone' => 'ET',
        ];
    }
}
