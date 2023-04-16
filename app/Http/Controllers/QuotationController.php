<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PDF;

class QuotationController extends Controller
{
    public function index() 
    {
        // $id = Auth::user()->id;
		// $adminData = Admin::find($id);
        $customers = Customer::orderBy('customer_name','ASC')->get();
        $products = Product::orderBy('product_name','ASC')->get();
        return view('admin.Backend.Quotation.quotation_form', compact('products','customers'));
    }

    public function saveUser(Request $request)
    {
        $request->validate([
    		'customer_id' => 'required',
    		'quoDate' => 'required',
            'expDate' => 'required',
    	],[
    		'customer_id.required' => 'Please Select a Customer',
            'quoDate.required' => 'Please Enter Quotation Date',
            'expDate.required' => 'Please Enter Quotation Expiry Date',
    	]);

        $quotation_id = Quotation::insertGetId([
            'customer_id' => $request->customer_id,
            'auth_id' => $request->auth_id,
            'invoice' => 'STA'.mt_rand(10000000,99999999),
            'quotation_date' => $request->quoDate,
            'expire_date' => $request->expDate,
            'sub_total' => $request->subtotal,
            'grand_total' => $request->grandtotal,
            'discount_percentage' => $request->dper,
            'discount_flat' => $request->dflat,
            'vat_percentage' => $request->vper,
            'vat_amount' => $request->vper,
            'paid_amount' => $request->paidamount,
            'due_amount' => $request->dueamount,
            'total_discount' => $request->dflat,
            'details' => $request->details,
            'created_at' => Carbon::now(),   
  
        ]);

        $item = $request->input('item');
        $description = $request->input('description');
        $unit_cost = $request->input('unit_cost');
        $qty = $request->input('qty');
        $amount = $request->input('amount');
    
        foreach ($item as $key => $value) {
            QuotationItem::create([
                'product_id' => $value,
                'quotation_id' => $quotation_id,
                'qty' => $qty[$key],
                'price' => $unit_cost[$key],
                // 'description' => $description[$key],
                'amount' => $amount[$key],
            ]);
        }
    
		// return redirect()->back();
        $notification = array(
			'message' => 'Quotation Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageQuotation(Request $request){
       
        $quotations = Quotation::latest()->get();
		return view('admin.Backend.Quotation.manage_quotation',compact('quotations'));

    }

    	// Quotation View 
	    public function viewQuotation($quotation_id){

            $quotation = Quotation::findOrFail($quotation_id);
            $quotationItems = QuotationItem::where('quotation_id',$quotation_id)->get();
            $customers = Customer::orderBy('customer_name','ASC')->get();
            $products = Product::orderBy('product_name','ASC')->get();

            return view('admin.Backend.Quotation.quotation_view',compact('quotation','customers','products','quotationItems'));

	} // end method 

    public function AdminInvoiceDownload($quotation_id){

		$quotation = Quotation::with('customer','auth')->where('id',$quotation_id)->first();
    	$quotationItem = QuotationItem::with('product','quotation')->where('quotation_id',$quotation_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('admin.Backend.Quotation.quotation_invoice',compact('quotation','quotationItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Quotation.pdf');

	} // end method 

    public function getData(Request $request){

    $selectedOption = $request->input('option');
    $data = Customer::findOrFail($selectedOption);

    return $data;

    }

    
    public function getDataProduct(Request $request){

        $selectedOption = $request->input('option');
        $data = Product::findOrFail($selectedOption);
    
        return $data;
    
    }

    public function getProductPrice(Request $request){

        $selectedOption = $request->input('option');
        $data = Product::findOrFail($selectedOption);
    
        return $data;
    
    }

    

}
