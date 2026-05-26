<?php

namespace Database\Seeders;

use App\Models\RepairIssue;
use Illuminate\Database\Seeder;

class RepairIssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RepairIssue::factory()->count(10)->create();
    }
}
