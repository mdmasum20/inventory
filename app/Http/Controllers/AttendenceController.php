<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Attendence;
use Illuminate\Support\Str;

class AttendenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // View to take attendence page---------
    public function takeAttendence()
    {
    	$all_employee = DB::table('employees')->get();
    	return view('takeAttendence', compact('all_employee'));
    }

    // Insert attendence to database------------
    public function insertAttendence(Request $request)
    {
    	$edit_date = date("d_m_y");
    	$get_edit_res = DB::table('attendences')->where('edit_date', $edit_date)->first();

    	if ($get_edit_res) {
    		$notification = array(
                'message' => 'Attendence already Added ',
                'alert-type' => 'warning'
            );
            return Redirect()->back()->with($notification);
    	}else{
	    	$date = date('d-F-Y');
	    	$year = date('Y');

	    	foreach ($request->employee_id as $id) {
	    		$data[] = [
	    			"employee_id"     => $id,
	    			"attendance"      => $request->attendance[$id],
	    			"attendance_date" => $date,
	    			"attendance_year" => $year,
	    			"edit_date"       => date("d_m_y"),

	    		];
	    	}

	    	$insert_result = DB::table('attendences')->insert($data);
	    	if ($insert_result) {
	            $notification = array(
	                'message' => 'Successfully Attendence Added ',
	                'alert-type' => 'success'
	            );
	            return Redirect()->back()->with($notification);
	        }else{
	            $notification = array(
	                'message' => 'Attendence does not Added ',
	                'alert-type' => 'danger'
	            );
	            return Redirect()->back()->with($notification);
	        }
    	}
    }

    // All Attendence view-----------
    public function allAttendence()
    {
    	$all_att = DB::table('attendences')
    				 // ->join('employees', 'attendences.employee_id', 'employees.id')
    				 // ->select('attendences.*', 'employees.*')
    				->select('attendance_date',)
    				->groupBy('attendance_date')
    				->get();
    	return view('allAttendence', compact('all_att'));
    }

    // View single date Attendence-----------
    public function viewAttendence($attendance_date)
    {
    	
    	return view('viewAttendence', compact('attendance_date'));
    }

    // Get data for edit attendence---------
    public function editAttendence($attendance_date)
    {
    	// echo $attendence_date;
    	return view('editAttendence', compact('attendance_date'));
    }

    // Update attendence to database------------
    public function updateAttendence(Request $request)
    {
    	$date = date('d-F-Y');
    	$year = date('Y');
    	$edit_date = date("d_m_y");

    	foreach ($request->id as $id) {
    		$data = [
    			"attendance"      => $request->attendance[$id],
    			"attendance_date" => $date,
    			"attendance_year" => $year,
    			"edit_date"       => $edit_date
    		];
    		$attendance = Attendence::where(['edit_date' => $edit_date, 'id' => $id])->first();
    		// return $data;
    		$attendance->update($data);
    	}

    	// return $date;

    	if ($attendance) {
            $notification = array(
                'message' => 'Successfully Attendence Updated ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Attendence does not Updated ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

































}
