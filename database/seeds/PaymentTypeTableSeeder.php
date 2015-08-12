<?php

class PaymentTypeTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        $types = [
            [
                'name' => 'Order Not Confirmed',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Cash On Delivery',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Online Payment',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ]
        ];

        \App\PaymentType::truncate();
        \App\PaymentType::insert($types);
    }
}