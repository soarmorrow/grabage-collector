<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('roles')->delete();

        Role::insert(
            [
                [
                    'name' => 'Administrator',
                    'created_at' => date('Y-m-d H:s:i'),
                    'updated_at' => date('Y-m-d H:s:i')
                ],
                [
                    'name' => 'Buyer',
                    'created_at' => date('Y-m-d H:s:i'),
                    'updated_at' => date('Y-m-d H:s:i')
                ]
            ]

        );
    }
}