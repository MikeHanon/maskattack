<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => '$2y$10$Lfy1Tt8UZ1SwwXNYQ/JFj.TbyY3B0zEV6k0OvXbr1MdVh9aOpxxeu',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-04-19 08:58:08',
                'verification_token' => '',
            ],
        ];

        User::insert($users);

    }
}
