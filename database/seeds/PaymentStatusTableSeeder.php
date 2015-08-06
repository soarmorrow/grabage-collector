<?php
/** 
 * File : PaymentStatusTableSeeder.php
 * Created by PhpStorm.
 * Project : garbagecollector
 * Description :
 * User: Vineeth N Krishan
 * Mail: vineeth@soarmorrow.com
 * Date: 6/8/15
 * Time: 12:35 PM
 */

class PaymentStatusTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        $payment_statuses = [
            [
                'name'=>'Paid',
                'label'=>'success',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'Payment Failed',
                'label'=>'danger',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'Payment Success',
                'label'=>'success',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'Transaction Success',
                'label'=>'success',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'Transaction Failed',
                'label'=>'danger',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'Payment Pending',
                'label'=>'warning',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ],
            [
                'name'=>'Cash On Delivery',
                'label'=>'info',
                'created_at' => current_time(),
                'updated_at'=>current_time()
            ]
        ];
        \App\PaymentStatus::truncate();
        \App\PaymentStatus::insert($payment_statuses);
    }
}