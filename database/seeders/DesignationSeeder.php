<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Designation::create([
            'company_id' => 1,
            'created_by' => 1,
            'name' => 'Software Engineer',
            'description' => 'Software Engineer',
        ]);

        Designation::create([
            'company_id' => 1,
            'created_by' => 1,
            'name' => 'HR Manager',
            'description' => 'HR Manager',
        ]);
    }
}
