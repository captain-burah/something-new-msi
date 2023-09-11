<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project_status;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property_release::create([
            'name' => 'Active'
        ]);

        Property_release::create([
            'name' => 'Draft'
        ]);

        Property_release::create([
            'name' => 'Trash'
        ]);
    }
}
