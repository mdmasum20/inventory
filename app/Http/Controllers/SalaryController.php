<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\AdvanceSalary;
use App\Models\Salary;
use Illuminate\Support\Str;

class SalaryController extends Controller
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

    // Return view to Pay Advance Salary page
    public function payAdvanceSalary()
    {
    	return view('payAdvanceSalary');
    }

    // Insert Advance Salary to database
    public function insertAdvanceSallary(Request $request)
    {

    	$month = $request->month;
    	$emp_id = $request->employee_id;
    	$get_res = DB::table('advanced_salaries')
    				->where('month', $month)
    				->where('employee_id', $emp_id)
    				->first();
    	if ($get_res) {
    		$notification = array(
                'message' => 'Advance Salary already Payed ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
    	}else{
    		$validatedData = $request->validate([
	            'advanced_salary' => 'required'
	        ]);

	        $data = array();

	        $data['employee_id'] = $request->employee_id;
	        $data['month'] = $request->month;
	        $data['year'] = $request->year;
	        $data['advanced_salary'] = $request->advanced_salary;

	        // echo "<pre>";
	        // print_r($data);

	        $insert_result = DB::table('advanced_salaries')->insert($data);
	        if ($insert_result) {
	            $notification = array(
	                'message' => 'Successfully Advance Salary Payed ',
	                'alert-type' => 'success'
	            );
	            return Redirect()->route('all.salary')->with($notification);
	        }else{
	            $notification = array(
	                'message' => 'Advance Salary does not Payed ',
	                'alert-type' => 'danger'
	            );
	            return Redirect()->back()->with($notification);
	        }
    	}

    	
    }

    // Return view to Pay Salary page
    public function paySalary()
    {
    	$adv_check = DB::table('employees')->get();
		// echo "<pre>";
		// print $adv_check->name;
        // print_r($adv_check);
    	return view('paySalaryList', compact('adv_check'));
    	// return view('paySalary')->with('adv_check',$adv_check);
    }

    // New Pay Salary List view
    public function newPaySalary()
    {
        echo "string";
    }

    // Insert Advance Salary to database
    public function insertPayingSallary(Request $request)
    {
    	$validatedData = $request->validate([
            'paying_salary' => 'required'
        ]);

        $data = array();

        $data['employee_id'] = $request->employee_id;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        $data['paying_salary'] = $request->paying_salary;

        // echo "<pre>";
        // print_r($data);

        $insert_result = DB::table('advanced_salaries')->insert($data);
        if ($insert_result) {
            $notification = array(
                'message' => 'Successfully Advance Salary Payed ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.salary')->with($notification);
        }else{
            $notification = array(
                'message' => 'Advance Salary does not Payed ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }


    // All salary view
    public function allSalary()
    {
    	$Customer_result = Customer::all();
    	return view('allSalary');
    }






































}
