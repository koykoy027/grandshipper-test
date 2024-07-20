<?php

namespace Database\Seeders;

use App\Models\GlobalParameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlobalParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gender 
        GlobalParameter::create([
            'type' => 1,
            'code' => 1,
            'name' => 'Male',
        ]);
        GlobalParameter::create([
            'type' => 1,
            'code' => 2,
            'name' => 'Female',
        ]);

        // Civil Status
        GlobalParameter::create([
            'type' => 2,
            'code' => 1,
            'name' => 'Single',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'code' => 2,
            'name' => 'Married',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'code' => 3,
            'name' => 'Divorce',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'code' => 4,
            'name' => 'Widowed',
        ]);
        GlobalParameter::create([
            'type' => 2,
            'code' => 5,
            'name' => 'Seperated',
        ]);

        // Religion
        GlobalParameter::create([
            'type' => 3,
            'code' => 1,
            'name' => 'Roman Catholic',
        ]);
        GlobalParameter::create([
            'type' => 3,
            'code' => 2,
            'name' => 'Muslim',
        ]);
        GlobalParameter::create([
            'type' => 3,
            'code' => 3,
            'name' => 'Iglesia ni Cristo',
        ]);

        // Address Information Type
        GlobalParameter::create([
            'type' => 4,
            'code' => 1,
            'name' => 'Home Address',
        ]);

        // One Time Password Portal
        GlobalParameter::create([
            'type' => 5,
            'code' => 1,
            'name' => 'Email',
        ]);
        GlobalParameter::create([
            'type' => 5,
            'code' => 2,
            'name' => 'SMS',
        ]);        

    }
}
