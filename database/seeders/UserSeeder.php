<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['username' => 'test'], [
            'name' => 'Test User',
            'username' => 'test',
            'role' => 'superadmin',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($user->id);
    }
}
