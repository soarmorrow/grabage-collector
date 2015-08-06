<?php

/**
 * File : GarbageTypeTableSeeder.php
 * Created by PhpStorm.
 * Project : garbagecollector
 * Description :
 * User: Vineeth N Krishan
 * Mail: vineeth@soarmorrow.com
 * Date: 5/8/15
 * Time: 6:25 PM
 */
class GarbageTypeTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        $types = [
            [
                'name' => 'Agricultural',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Electrical',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Electronics',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Domestic',
                'created_at' => current_time(),
                'updated_at' => current_time()
            ],
            [
                'name' => 'Food',
                'created_at'=> current_time(),
                'updated_at'=>current_time()
            ]
        ];

        \App\GarbageType::truncate();
        \App\GarbageType::insert($types);
    }

}