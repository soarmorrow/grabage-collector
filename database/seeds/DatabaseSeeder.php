<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded successfully');

        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded successfully');

        $this->call('UserRoleTableSeeder');
        $this->command->info('User Role table seeded successfully');

    }

}
