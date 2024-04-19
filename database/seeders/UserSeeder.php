<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $users = [
            ['id'=>1,'name'=>'Manager','email'=>'manager@gmail.com','password'=>'$2y$10$vRXbDp0.u.jT0XkwWBH.fuvUnaL7uc3CyVVv2aL0IQgZYnaAog16.'],
            ['id'=>2,'name'=>'Sales','email'=>'sales@gmail.com','password'=>'$2y$10$vRXbDp0.u.jT0XkwWBH.fuvUnaL7uc3CyVVv2aL0IQgZYnaAog16.'],
            ['id'=>3,'name'=>'Warehouse','email'=>'warehouse@gmail.com','password'=>'$2y$10$vRXbDp0.u.jT0XkwWBH.fuvUnaL7uc3CyVVv2aL0IQgZYnaAog16.'],
            ['id'=>4,'name'=>'Mechanic','email'=>'mechanic@gmail.com','password'=>'$2y$10$vRXbDp0.u.jT0XkwWBH.fuvUnaL7uc3CyVVv2aL0IQgZYnaAog16.'],
        ];

        DB::table('users')->insert($users);    
    }
}
