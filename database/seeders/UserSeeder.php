<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'address' => 'CG',
            'dob' => '06-06-1999',
            'phoneno' => '98665456',
            'post' => 'Manager',
            'bloodgroup' => 'A+',
        ]);
    }
}
