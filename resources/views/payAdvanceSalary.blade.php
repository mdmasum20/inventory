@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Advance Salary</li>
            </ol>
        </div>
    </div>

    <!-- Form-validation -->
    <div class="row">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Pay Advance Salary</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="PayAdvanceForm" method="post" action="{{ url('/pay-add-employee') }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Employee Name *</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="employee_id" name="employee_id">
                                    	@php
                                    		$all_employee = DB::table('employees')->get();
                                    	@endphp
                                    	@foreach($all_employee as $emp)
                                    	<option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                    	@endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="confirm_password" class="control-label col-lg-2">Month *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="month" name="month" type="text" value="@php echo date('F'); @endphp" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Year *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="year" name="year" type="text" value="@php echo date('Y'); @endphp" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Advanced *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="advanced_salary" name="advanced_salary" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Salary *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="salary" name="salary" value="{{ $emp->salary }}" type="text" readonly>
                                </div>
                            </div>           
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Pay</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .form -->

                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->

    </div> <!-- End row -->

                
@endsection