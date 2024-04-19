<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();

        $roles = [
            ['id'=>1,'name'=>'manager','guard_name'=>'web'],
            ['id'=>2,'name'=>'sales','guard_name'=>'web'],
            ['id'=>3,'name'=>'warehouse','guard_name'=>'web'],
            ['id'=>4,'name'=>'mechanic','guard_name'=>'web'],
        ];

        DB::table('roles')->insert($roles);    
    }
}
