<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function DealerView(){
		$customers = Customer::where('dea_cus',2)->orderBy('customer_name','ASC')->get();
		return view('admin.Backend.Dealer.dealer' ,compact('customers'));
	}


     public function DealerStore(Request $request){

    	$request->validate([
    		 
    		'customer_name' => 'required',
    	],[
    		'phone' => 'required',
    		 
    	]);

        Customer::insert([
		'customer_name' => $request->customer_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
		'dea_cus' => 2,
    	]);

	    $notification = array(
			'message' => 'Dealer Added Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method
}
