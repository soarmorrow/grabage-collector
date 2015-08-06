<?php

class OptionTableSeeder extends \Illuminate\Database\Seeder{

    public function run()
    {
        $options = [
            [
                'name'=>'rate',
                'value'=>'4',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'app',
                'value'=>'Garbage Collector',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'language',
                'value'=>'English',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'sent_from',
                'value'=>'no-reply@gmail.com',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'facebook',
                'value'=>'gc',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'google_plus',
                'value'=>'+gc',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'twitter',
                'value'=>'@gc',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'about',
                'value'=>'{"title":"Title","content":"content"}',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'legal',
                'value'=>'{"title":"Title","content":"content"}',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'contact',
                'value'=>'Contact para',
                'created_at'=>current_time(),
                'updated_at'=>current_time()
            ]
        ];

        \App\Option::truncate();
        \App\Option::insert($options);
    }
}