<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierView(){
		$supplier = Supplier::latest()->get();
		return view('admin.Backend.Supplier.supplier' ,compact('supplier'));
	}

    public function SupplierStore(Request $request){

    	$request->validate([
    		'supplier_name' => 'required',
    		'address' => 'required',
            'mobile' => 'required',
            'email_address' => 'required',
    	],[
    		'supplier_name.required' => 'Please Enter Supplier Name',
            'address.required' => 'Please Enter Address',
            'mobile.required' => 'Please Enter Mobile Number',
            'email_address.required' => 'Please Email Address',
    	]);

	    Supplier::insert([
		'supplier_name' => $request->supplier_name,
		'address' => $request->address,
        'mobile' => $request->mobile,
        'email_address' => $request->email_address,
        'phone' => $request->phone,
        'city' => $request->city,
        'state' => $request->state,
        'zip' => $request->zip,
        'country' => $request->counntry,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Supplier Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } // end method

	public function SupplierManage(){
		$suppliers = Supplier::latest()->get();
		return view('admin.Backend.Supplier.supplier_manage' ,compact('suppliers'));
	}

}
