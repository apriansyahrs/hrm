<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'company_id' => 1,
            'name' => 'Admin',
            'display_name' => 'Admin',
            'description' => 'Admin role',
        ]);

        Role::create([
            'company_id' => 1,
           'name' => 'staff',
            'display_name' => 'Staff',
            'description' => 'Staff role',
        ]);
    }
}
