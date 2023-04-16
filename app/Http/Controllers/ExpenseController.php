<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{
    public function EnpenseTypeView (){

    	$expenseTypes = ExpenseType::latest()->get();
    	return view('admin.Backend.Expense.expenseType',compact('expenseTypes'));
    }

    public function EnpenseTypeStore(Request $request){

    //    $request->validate([
    // 		'expense' => 'required',
			// 'category_image' => 'required',
    		// 'category_icon' => 'required',
    	// ],[
    	// 	'category_name.required' => 'Input Category Name',
			// 'category_image.required' => 'Input Category Image',
    	// ]);
		
		// $image = $request->file('category_image');
    	// $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	// Image::make($image)->save('upload/category/'.$name_gen);
    	// $save_url = 'upload/category/'.$name_gen;
    	 

	ExpenseType::insert([
		'expenseType' => $request->expenseType,
		// 'category_image' => $save_url,
		// 'feature' => $request->featured,
	
		// 'category_icon' => $request->category_icon,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Expense Type Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	public function ExpenseView (){

    	$expenseTypes = ExpenseType::latest()->get();
    	return view('admin.Backend.Expense.expense',compact('expenseTypes'));
    }

    public function ExpenseStore(Request $request){

        Expense::insert([
            'expenseType_id' => $request->expenseType,
            'date' => $request->date,
            'amount' => $request->amount,
            'details' => $request->details,
            'created_at' => Carbon::now(),   
    
            ]);
            
           
            $notification = array(
                'message' => 'Expense Added Successfully',
                'alert-type' => 'success'
            );
    
    
            return redirect()->back()->with($notification);
    
        } // end method 

        public function ExpenseManage (){

            $expenses = Expense::latest()->get();
            return view('admin.Backend.Expense.manage_expense',compact('expenses'));
        }
}
