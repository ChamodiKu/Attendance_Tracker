<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();

        // $user = User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('Test12345'),
        // ]);

        // $user->assignRole('Admin');

        // $user = User::factory()->create([
        //     'name' => 'Super Admin User',
        //     'email' => 'super.admin@example.com',
        //     'password' => Hash::make('Test12345'),
        // ]);

        // $user->assignRole('Super Admin');

        // $user = User::factory()->create([
        //     'name' => 'Test 1 User',
        //     'email' => 'test1@example.com',
        //     'password' => Hash::make('Test12345'),
        // ]);

        // $user->assignRole('Teacher');

        // $user = User::factory()->create([
        //     'name' => 'Test2 User',
        //     'email' => 'test2@example.com',
        //     'password' => Hash::make('Test12345'),
        // ]);

        // $user->assignRole('Teacher');
    }
}
