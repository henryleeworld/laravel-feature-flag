<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create(['name' => __('Team :team_id', ['team_id' => 1])]);
        Team::create(['name' => __('Team :team_id', ['team_id' => 2])]);
    }
}
