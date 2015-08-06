<?php

class StatusTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        $status = [
            [
                'name' => 'Order Initiated',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Confirmation Pending',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Order Confirmed',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Pending Process',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Process Progressing',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Order Completed',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ]

        ];
        \App\Status::truncate();
        \App\Status::insert($status);
    }
}