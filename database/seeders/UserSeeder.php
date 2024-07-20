<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'email' => 'villanuevajoshua27@gmail.com',
            'password' => 'Pa$$w0rd!',
        ]);

        UserProfile::create([
            'id' => $user->id,
            'suffix' => '',
            'firstname' => 'Joshua',
            'middlename' => 'Alfaro',
            'lastname' => 'Villanueva',
            'gender' => 1,
            'civil_status' => 1,
            'religion' => 1,
            'role' => '',
            'is_admin' => true,
            'is_required_to_change_password' => false,
            'is_otp_enabled' => false,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);


        UserAddress::create([
            'user_id' => $user->id,
            'type' => '1',
            'region' => '03',
            'province' => '0314',
            'city' => '031420',
            'barangay' => '031420003',
            'address' => 'Blk 20 Lot 24 Daisy Street Evergreen Heights',
            'zip_code' => '3023',
        ]);
    }
}
