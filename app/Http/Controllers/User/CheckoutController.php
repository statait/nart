<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // public function DistrictGetAjax($division_id){

    // 	$ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
    // 	return json_encode($ship);

    // } // end method 


    //  public function StateGetAjax($district_id){

    // 	$ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
    // 	return json_encode($ship);

    // } // end method 

    public function CheckoutStore(Request $request){
        //  dd($request->all());

        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division_id'] = $request->division_id;
    	$data['district_id'] = $request->district_id;
    	$data['state_id'] = $request->state_id;
    	$data['notes'] = $request->notes;
		// $data['coupon'] = $request->;
		$cartTotal = Cart::total();
		// $total = (int)str_replace(',','',Cart::total());
		// $total_amount = round($total - $total * $coupon->coupon_discount/100);

		



    	if ($request->payment_method == 'cod') {
    		return view('frontend.payment.cash',compact('data','cartTotal'));
    	}elseif ($request->payment_method == 'pos') {
    		return view('frontend.payment.cash',compact('data','cartTotal'));
    	}else{
			return view('frontend.payment.cash',compact('data','cartTotal'));
    	}


    }// end mehtod. 
 

}
