<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fuels')->delete();

        $fuels = [
            ['fuel'=>'CNG'],
            ['fuel'=>'Diesel'],
            ['fuel'=>'Electric'],
            ['fuel'=>'Hydrogen'],
            ['fuel'=>'LPG'],
            ['fuel'=>'Petrol']
        ];

        DB::table('fuels')->insert($fuels);        
    }
}
