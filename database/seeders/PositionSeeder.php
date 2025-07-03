<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($organizationId): void
    {
        DB::table('positions')->insert([
            'name' => 'Song Leader',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Singer 1',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Singer 2',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Keyboardist',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Bassist',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Drummer',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Guitarist',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Conguero',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Sound Engineer',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Multimedia',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Sunday School',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Usher 1',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Usher 2',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Offering Prayer',
            'organization_id' => $organizationId,
        ]);

        DB::table('positions')->insert([
            'name' => 'Intercessory Prayer',
            'organization_id' => $organizationId,
        ]);
    }
}
