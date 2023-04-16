<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcidProduct;
use App\Models\Product;
use App\Models\Production;
use App\Models\TodaysProduction;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function AddProduction(){
        $products = Product::orderBy('product_name','ASC')->get();

		return view('admin.Backend.Production.production', compact('products'));
	}


	public function StoreProduction(Request $request){

		// dd($request);

        $item = $request->input('item');
        $stock = $request->input('stock');
        $qty = $request->input('qnty');
       
        foreach ($item as $key => $value) {

            $matchProduct = Product::where('id',$value)->get();

            $productIDs = $matchProduct->pluck('id')->toArray();
            
            foreach($productIDs as $product) {
                // dd($product);
                // print($product.',');

                // if(isset($product->qty) && $product->qty == null){
                //     Product::findOrFail($product)->update([
                //         'qty' => $qty[$key],
                //     ]);
                // }else{
                    Product::findOrFail($product)->update([
                        'qty' => $stock[$key] - $qty[$key] ,
                    ]);
                // }
            }

            Production::create([
                'product_id' => $value,
                'qty' => $qty[$key],
            ]);
        }



       $notification = array(
			'message' => 'Production Added Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

	public function AddTodaysProduction(){
        // $products = Product::orderBy('product_name','ASC')->get();

		return view('admin.Backend.Production.todaysProduction');
	}

	public function StoreTodaysProduction(Request $request){

        $sumQty = 0;

            TodaysProduction::create([
                'product' => 'Sulphuric Acid',
                'qty' => $request->qnty,      
            ]);

            $stock = AcidProduct::find(1);
            $stock->stock += $request->qnty;
            $stock->save();            

       $notification = array(
			'message' => 'Todays Production Added Successfully',
			'alert-type' => 'success'
		);

		// return redirect()->route('manage-product')->with($notification);
		return redirect()->back()->with($notification);

	} // end method

}
