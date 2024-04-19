<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->delete();

        $types = [
            ['type'=>'Convertible'],        
            ['type'=>'Hatchback'],
            ['type'=>'Jeep'],
            ['type'=>'MUV/SUV'],
            ['type'=>'Sedan'],
            ['type'=>'Van'],
            ['type'=>'Wagon']
        ];

        DB::table('types')->insert($types);        
    }
}
