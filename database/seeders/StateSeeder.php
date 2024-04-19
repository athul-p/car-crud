<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->delete();

        $states = [
            ['state_code' => 'PY','state_name' => 'Puducherry'],
            ['state_code' => 'AP','state_name' => 'Andhra Pradesh'],
            ['state_code' => 'UT','state_name' => 'Uttarakhand'],
            ['state_code' => 'KL','state_name' => 'Kerala'],
            ['state_code' => 'LD','state_name' => 'Lakshadweep'],
            ['state_code' => 'TG','state_name' => 'Telangana'],
            ['state_code' => 'ML','state_name' => 'Meghalaya'],
        ];

        DB::table('states')->insert($states);  
    }
}

