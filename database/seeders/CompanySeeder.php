<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Company 1',
            'email' => 'company1@example.com',
            'phone' => '1234567890',
            'website' => 'www.company1.com',
            'logo' => 'company1.png',
            'address' => 'Address 1',
            'status' => 'active',
            'total_users' => 10,
            'clock_in_time' => '08:00:00',
            'clock_out_time' => '17:00:00',
            'early_clock_in_time' => '15',
            'allow_clock_out_till' => '15',
            'self_clocking' => 1,
        ]);
    }
}
