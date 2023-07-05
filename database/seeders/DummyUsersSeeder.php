<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'role' => 'operator',
                'password' => bcrypt('123456')
            ],
        ];

        foreach($user_data as $key => $value){
            User::create($value);
        }
    }
}
