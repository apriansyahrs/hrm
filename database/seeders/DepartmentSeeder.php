<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'company_id' => 1,
            'created_by' => 1,
            'name' => 'IT',
            'description' => 'Information Technology',
        ]);

        Department::create([
            'company_id' => 1,
            'created_by' => 1,
            'name' => 'HR',
            'description' => 'Human Resource',
        ]);
    }
}
