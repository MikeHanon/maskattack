<?php

use App\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => '1',
                'name'       => 'Lead',
                'created_at' => '2020-04-19 08:32:57',
                'updated_at' => '2020-04-19 08:32:57',
            ],
            [
                'id'         => '2',
                'name'       => 'Customer',
                'created_at' => '2020-04-19 08:32:57',
                'updated_at' => '2020-04-19 08:32:57',
            ],
            [
                'id'         => '3',
                'name'       => 'Partner',
                'created_at' => '2020-04-19 08:32:57',
                'updated_at' => '2020-04-19 08:32:57',
            ],
        ];

        CrmStatus::insert($crmStatuses);

    }
}
