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

        $this->call('OptionTableSeeder');
        $this->command->info('Options table seeded successfully');

        $this->call('PaymentStatusTableSeeder');
        $this->command->info('Payment Status table seeded successfully');

        $this->call('PaymentTypeTableSeeder');
        $this->command->info('Payment Types table seeded successfully');

        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded successfully');

        $this->call('UserRoleTableSeeder');
        $this->command->info('User Role table seeded successfully');

        $this->call('StatusTableSeeder');
        $this->command->info('Status table seeded successfully');

        $this->call('GarbageTypeTableSeeder');
        $this->command->info('Garbage Type table seeded successfully');

    }

}
