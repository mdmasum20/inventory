<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Expense;
use Illuminate\Support\Str;

class ExpenseController extends Controller
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

    // View new expance page-----------------------------
    public function newExpense()
    {
    	return view('newExpense');
    }

    // Insert Expense to database-----------
    public function addExpense(Request $request)
    {
    	$validatedData = $request->validate([
            'expense_name' => 'required',
            'expense_details' => 'required|max:255|min:4',
            'expense_amount' => 'required'
        ]);

        $data = array();

        $data['expense_name'] = $request->expense_name;
        $data['expense_details'] = $request->expense_details;
        $data['expense_amount'] = $request->expense_amount;
        $data['expense_date'] = date('d-F-Y');
        $data['expense_day'] = date('D');
        $data['expense_month'] = date('F');
        $data['expense_year'] = date('Y');

        $insert_result = DB::table('expenses')->insert($data);
        if ($insert_result) {
            $notification = array(
                'message' => 'Successfully Expense Added ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.expense')->with($notification);
        }else{
            $notification = array(
                'message' => 'Expense does not Added ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // Today expense list view------------------
    public function todayExpense()
    {
    	$date = date('d-F-Y');

    	$result = DB::table('expenses')->where('expense_date', $date)->get();
    	return view('todayExpense', compact('result'));
    }

    // This Month expense list view------------------
    public function ThisMonthExpense()
    {
    	// $date = date('d-F-Y');
    	$month = date('F');

    	$result = DB::table('expenses')
    				// ->where('expense_date', $date)
    				->where('expense_month', $month)
    				->get();
    	return view('ThisMonthExpense', compact('result'));
    }

    // This Year expense list view------------------
    public function ThisYearExpense()
    {
    	// $date = date('d-F-Y');
    	// $month = date('F');
    	$year = date('Y');

    	$result = DB::table('expenses')
    				// ->where('expense_date', $date)
    				// ->where('expense_month', $month)
    				->where('expense_year', $year)
    				->get();
    	return view('ThisYearExpense', compact('result'));
    }

    // View Single Expense Details----------------
    public function viewExpense($id)
    {
    	$view_result = DB::table('expenses')
    					->where('id', $id)
    					->first();

    	return view('viewExpense', compact('view_result'));
    }

    // Delete Single Expense----------------
    public function deleteExpense($id)
    {
    	$delete_result = DB::table('expenses')
    					->where('id', $id)
    					->delete();
    	if ($delete_result) {
            $notification = array(
                'message' => 'Successfully Expense deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Expense does not deleted ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // View Edit page for expense-------------
    public function editExpense($id)
    {
    	$view_result = DB::table('expenses')
    					->where('id', $id)
    					->first();

    	return view('editExpense', compact('view_result'));
    }

    // Update Expense to database-----------
    public function updateExpense(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'expense_name' => 'required',
            'expense_details' => 'required|max:255|min:4',
            'expense_amount' => 'required'
        ]);

        $data = array();

        $data['expense_name'] = $request->expense_name;
        $data['expense_details'] = $request->expense_details;
        $data['expense_amount'] = $request->expense_amount;

        $update_result = DB::table('expenses')
        					->where('id', $id)
        					->update($data);
        if ($update_result) {
            $notification = array(
                'message' => 'Successfully Expense Updated ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.expense')->with($notification);
        }else{
            $notification = array(
                'message' => 'Expense does not Updated ',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }





























}
