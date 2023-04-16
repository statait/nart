<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use phpDocumentor\Reflection\Types\Null_;

class CashController extends Controller
{
    public function CashOrder(Request $request){

		$coupon = NULL;

    	if (Session::has('coupon')) {
			$coupon = Session::get('coupon')['coupon_name'];
			$discount_amount = Session::get('coupon')['discount_amount'];
			$discount_percentage = Session::get('coupon')['coupon_discount'];
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
			
			$total_amount =  (string)(Cart::total());
    	}

		if ($coupon != NULL) {
			$coupon_Name = $coupon;
			$coupon_discount = $discount_amount;
			$coupon_percentage = $discount_percentage;
		}else{
			$coupon_Name = 'No Coupon';
			$coupon_discount = 'No Discount';
			$coupon_percentage = '0';
		}

	  // dd($charge);

	  if ($request->payment_method == 'pos') {
		$payment = 'POS';
	  }elseif($request->payment_method == 'cod'){
		$payment = 'Cash on Delivery';
	  }else{
		$payment = 'Digital Payment';
	  }
	  
     $order_id = Order::insertGetId([
     	'user_id' => Auth::id(),
     	'division_id' => $request->division_id,
     	'district_id' => $request->district_id,
     	'state_id' => $request->state_id,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
     	'post_code' => $request->post_code,
     	'notes' => $request->notes,

     	'payment_type' => $payment,
     	'payment_method' => $payment,

     	'currency' =>  'TK',
     	'amount' => $total_amount,
		'coupon' => $coupon_Name,
		'coupon_discount' => $coupon_discount,
		'coupon_percentage' => $coupon_percentage,

     	'invoice_no' => 'STA'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'pending',
     	'created_at' => Carbon::now(),	 

     ]);

     // Start Send Email 
     $invoice = Order::findOrFail($order_id);
     	$data = [
     		'invoice_no' => $invoice->invoice_no,
     		'amount' => $total_amount,
     		'name' => $invoice->name,
     	    'email' => $invoice->email,
     	];

     	// Mail::to($request->email)->send(new OrderMail($data));

     // End Send Email 


     $carts = Cart::content();
     foreach ($carts as $cart) {
     	OrderItem::insert([
     		'order_id' => $order_id, 
     		'product_id' => $cart->id,
     		'color' => $cart->options->color,
     		'size' => $cart->options->size,
     		'qty' => $cart->qty,
     		'price' => $cart->price,
     		'created_at' => Carbon::now(),

     	]);
     }

	 if (Session::has('coupon')) {
		Session::forget('coupon');
	}

	Cart::destroy();

	 return redirect()->route('confirmed.order', compact('order_id'));
	//  return view('frontend.payment.orderReceived',compact('data','carts'));
	
	//  return redirect()->route('order.received', compact('order_id','carts'));

    //  if (Session::has('coupon')) {
    //  	Session::forget('coupon');
    //  }

    //  Cart::destroy();

    //  $notification = array(
	// 		'message' => 'Your Order Placed Successfully',
	// 		'alert-type' => 'success'
	// 	);

		// return redirect()->route('confirmed.order', compact('order_id'))->with($notification);

    } // end method 


	public function ConfirmedOrders($order_id){
		$order_id = $order_id;
		return view('frontend.payment.orderReceived', compact('order_id'));
	}




}