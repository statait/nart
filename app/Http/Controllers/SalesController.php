<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcidProduct;
use App\Models\Bank;
use App\Models\Customer;
use App\Models\PaymentItem;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\SalesPaymentItem;
use App\Models\TodaysProduction;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function SalesForm() 
    {
        // $id = Auth::user()->id;
		// $adminData = Admin::find($id);
        $banks = Bank::orderBy('bank_name','ASC')->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
        // $inventory = TodaysProduction::sum('qty');
        $acidProducts = AcidProduct::find(1);
        // $acidProducts = AcidProduct::orderBy('product_name','ASC')->first();
        $products = Product::orderBy('id','ASC')->get();
        return view('admin.Backend.Sales.sales_form', compact('customers','banks','acidProducts','products'));
    }

    public function SalesStore(Request $request)
    {

        $sale_id = Sales::insertGetId([
            'customer_id' => $request->customer_id,
            'sale_date' => $request->saleDate,
            'invoice' => 'INV'.mt_rand(10000000,99999999),
            'details' => $request->details,
            'sub_total' => $request->subtotal,
            'grand_total' => $request->grandtotal,
            'discount_flat' => $request->dflat,
            'discount_per' => $request->dper,
            'total_vat' => $request->vper,
            'p_paid_amount' => $request->paidamount,
            'due_amount' => $request->dueamount,
            'created_at' => Carbon::now(),   
  
        ]);

        
        $item = $request->input('item');
        $stock = $request->input('stock');
        $qty = $request->input('qnty');
        $rate = $request->input('rate');
        $amount = $request->input('amount');      
       
        foreach ($item as $key => $value) {

            $matchProduct = Product::where('id',$value)->get();

            $productIDs = $matchProduct->pluck('id')->toArray();
            
            foreach($productIDs as $product) {
                // dd($product);
                // print($product.',');
                $match1Product = Product::where('id',$product)->get();

                if(isset($product->qty) && $product->qty == null){
                    Product::findOrFail($product)->update([
                        'qty' => $qty[$key],
                    ]);
                }else{
                    Product::findOrFail($product)->update([
                        'qty' => $stock[$key] - $qty[$key] ,
                    ]);
                }
            }


            SalesItem::create([
                'product_id' => $value,
                'sale_id' => $sale_id,
                'qty' => $qty[$key],
                'rate' => $rate[$key],
                'amount' => $amount[$key],


            ]);
        }   

       

        $payitem = $request->input('payitem');
        $pay_amount = $request->input('pay_amount');
     
        foreach ($payitem as $key => $value) {

            SalesPaymentItem::create([
                'bank_id' => $value,
                'sale_id' => $sale_id,
                'b_paid_amount' => $pay_amount[$key],
            ]);
        }
    
		// return redirect()->back();
        $notification = array(
			'message' => 'Sale Saved Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageSales (){
       
        $sales = Sales::orderBy('id','DESC')->get();
		return view('admin.Backend.Sales.manage_sales',compact('sales'));
    }

    public function SaleEdit ($id){
        $products = Product::orderBy('id','ASC')->get();
		$sales = Sales::findOrFail($id);
        $salesItems = SalesItem::where('sale_id',$id)->get();
        $payItems = SalesPaymentItem::where('sale_id',$id)->get();
        $banks = Bank::orderBy('bank_name','ASC')->get();
        $customers = Customer::orderBy('customer_name','ASC')->get();
		return view('admin.Backend.Sales.sales_edit',compact('sales','salesItems','payItems','banks','customers','products'));
    }

    public function DownloadSale ($id){
                    
        $sale = Sales::findOrFail($id);
        $salesItems = SalesItem::where('sale_id',$id)->get();
    return view('admin.Backend.Sales.download_sale',compact('sale','salesItems'));
    }

    public function SaleFilterView (){
        return view('admin.Backend.Sales.filterSaleForm');
    }

    public function SaleFilter(Request $request){

        $sdate = $request->sdate;
		$edate = $request->edate;
		
		$filtersale = Sales::whereBetween('sale_date', [$sdate, $edate])->get();

       $notification = array(
			'message' => 'Filterd Sale Successfully',
			'alert-type' => 'success'
		);

	return view('admin.Backend.Sales.filteredSale' ,compact('filtersale'));

    } 


	public function DownloadSalePDF(Request $request)
    {	
		$filtersale = collect(json_decode($request->input('filtersale'), true))->mapInto(Sales::class);
        // $sdate = '2023-01-01';
        // $edate = '2023-03-31';
        // $datesInRange = Schedule::whereBetween('schedule_date', [$sdate, $edate])->get();
        if ($request->type === 'pdf') {
            $pdf = new Dompdf();
            $pdf->loadHTML(view('admin.Backend.Sales.sale_invoice', ['filtersale' => $filtersale])->render());
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            $pdf->stream('filtered-data.pdf');
        } else if ($request->type === 'excel') {
            // return Excel::download(new FilteredDataExport($datesInRange), 'filtered-data.xlsx');
			
        }
    }


}
