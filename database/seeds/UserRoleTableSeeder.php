<?php

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\UserRole;

class UserRoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_roles')->delete();

        UserRole::create([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }

}