<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $organizationId): void
    {
        // Get position IDs for this organization
        $positionIds = DB::table('positions')
            ->where('organization_id', $organizationId)
            ->pluck('id')
            ->toArray();

        DB::table('event_types')->insert([
            [
                'name' => 'Sunday Service',
                'description' => 'Weekly Sunday worship service',
                'organization_id' => $organizationId,
                'default_positions' => json_encode($positionIds),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
