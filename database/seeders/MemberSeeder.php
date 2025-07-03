<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $organizationId): void
    {
        Member::factory()
            ->withOrganizationId($organizationId)
            ->count(20)
            ->create();
    }
}
