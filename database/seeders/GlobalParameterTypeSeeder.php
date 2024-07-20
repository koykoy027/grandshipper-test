<?php

namespace Database\Seeders;

use App\Models\GlobalParameterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlobalParameterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GlobalParameterType::create([
            'name' => 'Gender', // id = 1
            'is_show' => 1,
        ]);
        GlobalParameterType::create([
            'name' => 'Civil Status', // id = 2
            'is_show' => 1,
        ]);
        GlobalParameterType::create([
            'name' => 'Religion', // id = 3
            'is_show' => 1,
        ]);
        GlobalParameterType::create([
            'name' => 'Address Information Type', // id = 4
            'is_show' => 1,
        ]);
        GlobalParameterType::create([
            'name' => 'One Time Password Portal', // id = 5
            'is_show' => 0,
        ]);
    }
}
