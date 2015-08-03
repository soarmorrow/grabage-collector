<?php

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'admin',
            'email' => 'vineeth@soarmorrow.com',
            'phone' => 9995362824,
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:s:i'),
            'updated_at' => date('Y-m-d H:s:i')
        ]);
    }

}