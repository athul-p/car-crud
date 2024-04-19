<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('makes')->delete();

        $makes = [
            ['make'=>'BMW'],
            ['make'=>'Ford Motor'],
            ['make'=>'Kia'],
            ['make'=>'Mercedes-Benz Group'],
            ['make'=>'Nissan'],
            ['make'=>'Renault'],
            ['make'=>'Toyota'],
            ['make'=>'Volkswagen AG'],
            ['make'=>'Volvo ']
        ];

        DB::table('makes')->insert($makes);        
    }
}
