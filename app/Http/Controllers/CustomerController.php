<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Dealer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class CustomerController extends Controller
{
    public function CustomerView(){
		$customers = Customer::where('dea_cus',1)->orderBy('customer_name','ASC')->get();
		return view('admin.Backend.Brand.customer' ,compact('customers'));
	}


     public function CustomerStore(Request $request){

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
		'dea_cus' => 1,
    	]);

	    $notification = array(
			'message' => 'Customer Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

	public function CustomerEdit($id){
		$customer = Customer::findOrFail($id);
			return view('admin.Backend.Brand.customer_edit',compact('customer'));
		}
	
	
	public function CustomerUpdate(Request $request, $id){
			
            Customer::findOrFail($id)->update([
				'customer_name' => $request->customer_name,
				'email' => $request->email,
				'phone' => $request->phone,
				'address' => $request->address,
				'dea_cus' => 1,
			]);
	
			$notification = array(
				'message' => 'Customer Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('customer.view')->with($notification);
	
			}  
	
	
		public function CustomerDelete($id){
		
			Customer::findOrFail($id)->delete();
	
			$notification = array(
				'message' => 'Customer Deleted Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->back()->with($notification);
	
		} // end method
	
}
