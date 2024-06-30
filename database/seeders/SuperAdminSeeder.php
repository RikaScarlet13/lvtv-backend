<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the super admin user if it doesn't exist
        $user = User::firstOrCreate(
            ['email' => 'superadmin@laverdad.edu.ph'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('@imanadmin123'),
                'role' => 'super_admin',
                'is_approved' => true,
            ]
        );

        // Output message to the console
        if ($user->wasRecentlyCreated) {
            $this->command->info('Super admin user created successfully.');
        } else {
            $this->command->info('Super admin user already exists.');
        }
    }
}
