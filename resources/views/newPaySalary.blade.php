@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Pay Salary</li>
            </ol>
        </div>
    </div>

    <!-- Form-validation -->
    <div class="row">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Pay New Salary</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="PaySalaryForm" method="post" action="{{ url('/insert_paying-salaey') }}" novalidate="novalidate" enctype="multipart/form-data">
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
                                <label for="email" class="control-label col-lg-2">Salary *</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="salary" name="salary" value="{{ $emp->salary }}" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Advanced</label>
                                <div class="col-lg-10">
                                        @php
                                            $c_month = date('F');
                                            $c_year = date('Y');
                                        @endphp
                                        @if($c_month == $adv_check->month && $c_year == $adv_check->year)
                                            <input class="form-control " value="{{ $adv_check->advanced_salary }}" id="advanced_salary" name="advanced_salary" type="text" readonly>
                                        @else
                                            <input class="form-control " value="Advanced Not Payed" id="advanced_salary" name="advanced_salary" type="text" readonly>
                                        @endif                      
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-2">Payable Salary *</label>
                                <div class="col-lg-10">
                                    @php
                                        $payable = $emp->salary - $adv_check->advanced_salary;
                                    @endphp
                                    <input class="form-control " id="paying_salary" name="paying_salary" value="{{ $payable }}" type="text" readonly>
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


    <script type="text/javascript">
        // $(document).ready(function(){
        //     $('select[name = "employee_id"]').on('change', function(){
        //         var employee_id = $(this).val();
        //         if (employee_id) {
        //             $.ajax({
        //                 url:"{{ url('/get/') }}/"+employee_id,
        //                 type:"GET",
        //                 dataType:"json",
        //                 success:function(data){
        //                     $("")
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
                
@endsection