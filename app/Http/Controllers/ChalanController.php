<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcidProduct;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\Bank;
use App\Models\TodaysProduction;
use Illuminate\Http\Request;
use App\Models\Chalan;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ChalanController extends Controller
{
    public function ChalanForm() 
    {
        // $customers = Sales::select('customer_id')->distinct()->pluck('customer_id');
        // dd($customers );
        $customerIds =Sales::join('customers', 'sales.customer_id', '=', 'customers.id')->select('sales.customer_id', 'customers.customer_name')
                ->distinct()->pluck('customers.customer_name', 'sales.customer_id');
        $inventory = TodaysProduction::sum('qty');
        $acidProducts = AcidProduct::orderBy('product_name','ASC')->first();
        // $products = Product::orderBy('product_name','ASC')->get();
        $banks = Bank::orderBy('bank_name','ASC')->get();
        return view('admin.Backend.Chalan.chalan_form', compact('customerIds','acidProducts','inventory','banks'));
    }

    public function ChalanStore(Request $request)
    {
        // $request->validate([
    	// 	'supplier_id' => 'required',
    	// 	'chalan' => 'required',
        //     'quoDate' => 'required',
    	// ],[
    	// 	'customer_id.required' => 'Please Select a Customer',
        //     'quoDate.required' => 'Please Enter Quotation Date',
        //     'expDate.required' => 'Please Enter Quotation Expiry Date',
    	// ]);

        $chalan_id = Chalan::insertGetId([
            'customer_id' => $request->customer_id,
            'company' => $request->company,
            'address' => $request->address,
            'chalan_date' => $request->chalanDate,
            't_driver' => $request->t_driver,
            't_no' => $request->t_no,
            'chalan_no' => 'RSA'.mt_rand(10000000,99999999),
            'qty' => $request->qnty,
            'rate' => $request->rate,
            'total' => $request->amount,
            // 'sub_total' => $request->subtotal,
            // 'grand_total' => $request->grandtotal,
            'nbalance' => $request->nbalance,
            'created_at' => Carbon::now(),   
  
        ]);

        $chalan = Chalan::find($chalan_id);
        $customer_id = $chalan->customer->id;
        $customer = Customer::find($customer_id);

        $customer->balance = $chalan->nbalance;
        $customer->delivery += $chalan->qty;
        $customer->due -= $chalan->qty;
        $customer->save();

        $stock = AcidProduct::find(1);
        $stock->stock -= $chalan->qty;
        $stock->save();            

		// return redirect()->back();
        $notification = array(
			'message' => 'Chalan Added Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageChalan (){
       
        $chalans = Chalan::orderBy('id','DESC')->get();
		return view('admin.Backend.Chalan.manage_chalan',compact('chalans'));
    }

    public function DownloadChalan ($id){
                    
        $chalan = Chalan::findOrFail($id);

    return view('admin.Backend.Chalan.view_chalan',compact('chalan'));
}


}
