<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Dealer;
use App\Models\Schedule;
use App\Models\TodaysProduction;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FilteredDataExport;

class ScheduleController extends Controller
{
    public function ScheduleView(){
		$customers = Customer::latest()->get();
        $inventory = TodaysProduction::sum('qty');
		return view('admin.Backend.Schedule.schedule' ,compact('customers','inventory'));
	}


     public function ScheduleStore(Request $request){

		

        $item = $request->input('item');
        $stock = $request->input('stock');
        $qty = $request->input('qnty');
		$time = $request->input('time');
       
        foreach ($item as $key => $value) {

            Schedule::create([
                'customer_id' => $value,
				'schedule_date' => $request->date,
				'stock' => $stock[$key],
                'qty' => $qty[$key],
				'time' => $time[$key],
            ]);
        }



       $notification = array(
			'message' => 'Schedule Added Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } 

	public function ManageSchedule(){
		
		$schedules = Schedule::orderBy('id','DESC')->get();
		return view('admin.Backend.Schedule.manageschedule',compact('schedules'));
	}


	public function ScheduleFilter(Request $request){

        $sdate = $request->sdate;
		$edate = $request->edate;
		
		$filterschedule = Schedule::whereBetween('schedule_date', [$sdate, $edate])->get();

    //    $notification = array(
	// 		'message' => 'Schedule Added Successfully',
	// 		'alert-type' => 'success'
	// 	);

	return view('admin.Backend.Schedule.filterschedule' ,compact('filterschedule'));

    } 


	public function download(Request $request)
    {	
		$filterschedule = collect(json_decode($request->input('filterschedule'), true))->mapInto(Schedule::class);
        // $sdate = '2023-01-01';
        // $edate = '2023-03-31';
        // $datesInRange = Schedule::whereBetween('schedule_date', [$sdate, $edate])->get();
        if ($request->type === 'pdf') {
            $pdf = new Dompdf();
            $pdf->loadHTML(view('admin.Backend.Schedule.schedule_invoice', ['filterschedule' => $filterschedule])->render());
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            $pdf->stream('filtered-data.pdf');
        } else if ($request->type === 'excel') {
            // return Excel::download(new FilteredDataExport($datesInRange), 'filtered-data.xlsx');
			
        }
    }


}
