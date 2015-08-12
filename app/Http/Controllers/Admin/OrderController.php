<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Order;
use App\PaymentStatus;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('backend.orders.inde')->withOrders(Order::orderBy('created_at','desc')->paginate(5));
    }

    /**
     * Display the specified resource.
     *
     * /**
     * @param Order $order
     * @return mixed
     */
    public function show(Order $order)
    {
        return view('backend.orders.show')->withOrder($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Order $order
     * @return mixed
     */
    public function edit(Order $order)
    {
        return view('backend.orders.edit')->withOrder($order);
    }

    public function update(Order $order, Request $request)
    {
        $this->validate($request, [
            'status' => 'required|numeric'
        ]);
        $order->status = $request->input('status');
        if($order->save()){
            $user = User::find($order->user_id);


            /**
             * Send a status update message
             */
            $message = "Hello ".$order->first_name.", Status for your order #".$order->id." has been updated to '".Status::find($request->input('status'))->name."'. (REF : ".$order->order_number.")";
            send_message($order->phone, $message);

            /**
             * Send Status update message
             */
            Mail::send('emails.confirmation', compact('order'), function($message) use ($user){
                $message->from(get_option('sent_from'), get_option('app'));
                $message->to($user->email, $user->name)->subject(get_option('app').' Progress Updated');
            });
            return redirect(route('orders'))->with('success','Progress has been updated');
        }else{
            return redirect(route('orders'))->with('error','Progress status update failed');
        }
    }


}
