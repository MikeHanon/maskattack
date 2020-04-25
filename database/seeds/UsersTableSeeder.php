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
                'name'               => 'Mike',
                'email'              => 'mike.hanon@gmail.com',
                'password'           => '$2y$10$if6H2WAHczKtTOjY9P4luuk5Zmpoxboqd4NbPB4wZ0Zr.foim03zy',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-04-19 08:58:08',
                'verification_token' => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'Adam',
                'email'              => 'ad.loukili@outlook.fr',
                'password'           => '$10$QXzzm12PfZR6XU.sBQJb.u27WZhGku3UCm2Z090r8JL.RhNPycAKO',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-04-19 08:58:08',
                'verification_token' => '',
            ],

            [
                'id'                 => 3,
                'name'               => 'Mehmet',
                'email'              => 'ozcan.mehmet@outlook.fr',
                'password'           => '$10$QXzzm12PfZR6XU.sBQJb.u27WZhGku3UCm2Z090r8JL.RhNPycAKO',
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2020-04-19 08:58:08',
                'verification_token' => '',
            ],
        ];

        User::insert($users);

    }
}
