<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use App\Models\RequisitionType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\toast;

class RequisitionController extends Controller
{
    public function RequisitionTypeView (){

    	$requisitionTypes = RequisitionType::latest()->get();
    	return view('admin.Backend.Requisition.requisitionType',compact('requisitionTypes'));
    }

    public function RequisitionTypeStore(Request $request){

	RequisitionType::insert([
		'requisitionType' => $request->requisitionType,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Requisition Type Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

    public function RequisitionView (){

    	$requisitionTypes = RequisitionType::latest()->get();
    	return view('admin.Backend.Requisition.requisition',compact('requisitionTypes'));
    }

    public function RequisitionStore(Request $request){

        Requisition::insert([
            'requisitionType_id' => $request->requisitionType,
            'date' => $request->date,
            'amount' => $request->amount,
            'details' => $request->details,
            'status' => 'Unpaid',
            'created_at' => Carbon::now(),   
    
            ]);
            
           
            $notification = array(
                'message' => 'Requisition Added Successfully',
                'alert-type' => 'success'
            );
    
    
            return redirect()->back()->with($notification);
    
        } // end method 

        public function RequisitionManage (){

            $requisitions = Requisition::latest()->get();
            return view('admin.Backend.Requisition.manage_requisition',compact('requisitions'));
        }
}
