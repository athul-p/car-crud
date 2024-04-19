<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();

        $cities = [
            [ 'city_id' => 134425, 'city_name' => 'Yanam'],
            [ 'city_id' => 134452, 'city_name' => 'Adoni'],
            [ 'city_id' => 134360, 'city_name' => 'Vikasnagar'],
            [ 'city_id' => 134400, 'city_name' => 'Wayanad'],
            [ 'city_id' => 132750, 'city_name' => 'Lakshadweep'],
            [ 'city_id' => 134454, 'city_name' => 'Alampur'],
            [ 'city_id' => 134410, 'city_name' => 'West Khasi Hills'],
        ];

        DB::table('cities')->insert($cities);  
    }
}
