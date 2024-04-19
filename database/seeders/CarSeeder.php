<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->delete();

        $cars = [
            ['make' => 1,'model' => 'E250d','year' =>2023, 'color' =>'Black', 'type' =>1, 'fuel' => 1,'seat_capacity' =>5, 'stock' => 30,'state' => 'PY', 'city' => 134425],
            ['make' => 7,'model' => 'A560','year' =>2020, 'color' =>'White', 'type' =>2, 'fuel' => 2,'seat_capacity' =>2, 'stock' => 22,'state' => 'TG', 'city' => 134454],
            ['make' => 3,'model' => 'G67','year' =>2016, 'color' =>'Green', 'type' =>3, 'fuel' => 3,'seat_capacity' =>7, 'stock' => 37,'state' => 'AP', 'city' => 134452],
            ['make' => 8,'model' => 'CF86K','year' =>2012, 'color' =>'Red', 'type' =>4, 'fuel' => 4,'seat_capacity' =>5, 'stock' => 42,'state' => 'LD', 'city' => 132750],
            ['make' => 9,'model' => 'L900','year' =>2010, 'color' =>'Blue', 'type' =>5, 'fuel' => 5,'seat_capacity' =>2, 'stock' => 45,'state' => 'KL', 'city' => 134400],
            ['make' => 5,'model' => 'V890','year' =>2015, 'color' =>'Yellow', 'type' =>6, 'fuel' => 6,'seat_capacity' =>6, 'stock' => 52,'state' => 'ML', 'city' => 134410],
            ['make' => 4,'model' => 'C1120','year' =>2019, 'color' =>'Brown', 'type' =>7, 'fuel' => 3,'seat_capacity' =>7, 'stock' => 63,'state' => 'UT', 'city' => 134360],
        ];

        DB::table('cars')->insert($cars);  
    }
}
