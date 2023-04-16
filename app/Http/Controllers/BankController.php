<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Carbon;

class BankController extends Controller
{
    public function BankView(){
		$banks = Bank::latest()->get();
		return view('admin.Backend.Bank.bank' ,compact('banks'));
	}


     public function BankStore(Request $request){

    	$request->validate([
    		'bank_name' => 'required',
    		'ac_name' => 'required',
            'ano_name' => 'required',
            'branch' => 'required',
    	],[
    		'bank_name.required' => 'Please Enter Bank Name',
            'ac_name.required' => 'Please Enter Account Name',
            'ano_name.required' => 'Please Enter Account Number',
            'branch.required' => 'Please Enter Branch',
    	]);

        if ($request->file('sign_image')) {

        $image = $request->file('sign_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	Image::make($image)->resize(200,200)->save('upload/bank/'.$name_gen);
    	$save_url = 'upload/bank/'.$name_gen;

	    Bank::insert([
		'bank_name' => $request->bank_name,
		'ac_name' => $request->ac_name,
        'ano_name' => $request->ano_name,
        'branch' => $request->branch,
		'sign_image' => $save_url,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Bank Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }else{
        Bank::insert([
            'bank_name' => $request->bank_name,
            'ac_name' => $request->ac_name,
            'ano_name' => $request->ano_name,
            'branch' => $request->branch,
			'balance' => $request->balance,
            'created_at' => Carbon::now(),   
            ]);
    
            $notification = array(
                'message' => 'Bank Inserted Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
     }
    } // end method

	public function BankEdit($id){
		$bank = Bank::findOrFail($id);
			return view('admin.Backend.Bank.bank_edit',compact('bank'));
		}
	
	
		public function BankUpdate(Request $request, $id){
			
            Bank::findOrFail($id)->update([
				'bank_name' => $request->bank_name,
				'ac_name' => $request->ac_name,
				'ano_name' => $request->ano_name,
				'branch' => $request->branch,
				'balance' => $request->balance,
			]);
	
			$notification = array(
				'message' => 'Bank Updated Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->route('bank.view')->with($notification);
	
			}  
	
			public function BankDelete($id){
		
				Bank::findOrFail($id)->delete();
		
				$notification = array(
					'message' => 'Bank Deleted Successfully',
					'alert-type' => 'info'
				);
		
				return redirect()->back()->with($notification);
		
			} // end method
}
