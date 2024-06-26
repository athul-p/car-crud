<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('model_has_roles')->delete();

        $model_has_roles = [
            ['role_id'=>1,'model_type'=>"App\\Models\\User",'model_id'=>1],
            ['role_id'=>2,'model_type'=>"App\\Models\\User",'model_id'=>2],
            ['role_id'=>3,'model_type'=>"App\\Models\\User",'model_id'=>3],
            ['role_id'=>4,'model_type'=>"App\\Models\\User",'model_id'=>4],
        ];

        DB::table('model_has_roles')->insert($model_has_roles); 
    }
}
