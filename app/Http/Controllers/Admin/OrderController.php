<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Order;
use App\User;
use Illuminate\Http\Request;
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
        return view('backend.orders.inde')->withOrders(Order::paginate(5));
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
