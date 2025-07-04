<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserOrganization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $organization = Organization::factory()->create();
        UserOrganization::factory()->create([
            'user_id' => $user->id,
            'organization_id' => $organization->id,
        ]);

        $this->callWith(PositionSeeder::class, ['organizationId' => $organization->id]);
        $this->callWith(MemberSeeder::class, ['organizationId' => $organization->id]);
        $this->callWith(EventTypesSeeder::class, ['organizationId' => $organization->id]);
    }
}
