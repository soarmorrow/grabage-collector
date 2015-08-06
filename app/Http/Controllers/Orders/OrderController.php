<?php namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Order;
use App\OrderAttachment;
use App\OrderGarbageType;
use App\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('q')){
            return view('frontend.user.order.index')->withOrders(Auth::user()->orders()->search($request->input('q'))->paginate(5));
        }
        return view('frontend.user.order.index')->withOrders(Auth::user()->orders()->paginate(10));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token','images','types');
        $data['user_id'] = (int)Auth::Id();
        $data['order_number'] = str_random(13) . time();
        $data['created_at'] = current_time();
        $data['phone'] = remove_symbols($data['phone']);
        $order = new Order;
        $order_id = $order->insertGetId($data);
        if($order_id){

            if($request->input('images')){
                OrderAttachment::unguard();
                foreach($request->input('images') as $image){
                    OrderAttachment::create(['order_id'=>$order_id, 'source_path'=>$image,'created_at'=>current_time()]);
                }
                OrderAttachment::reguard();
            }

            if($request->input('types')){
                OrderGarbageType::unguard();
                foreach($request->input('types') as $type){
                    OrderGarbageType::create(['order_id'=>$order_id, 'type_id'=>(int)$type,'created_at'=>current_time()]);
                }
                OrderGarbageType::reguard();
            }

            return redirect(route('confirm-order', [$order_id]))->with('confirm_order', true);
        }else{
            abort(500,'Order submission error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return $this
     */
    public function show(Order $order)
    {
        if(Session::get('confirm_order') != true){
            abort(401, 'Unauthorized access');
        }
        session(['checkout'=>true]);
        return view('frontend.user.order.confirm_order')->withOrder($order);
    }

    public function create(Order $order)
    {
        $checkout = Session::pull('checkout');
        if(empty($checkout)){
            abort(500, "Unauthorized Access");
        }

        $order->payment_type = PaymentStatus::where('name','Cash On Delivery')->first()->id;
        $order->save();
        return redirect(route('review-order', [$order->id, $order->order_number]))->with('success','Your Order Placed successfully');
    }

    public function view(Order $order, $order_number = null){
        return view('frontend.user.order.view')->with('order', $order);
    }
}
