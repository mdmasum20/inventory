@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Expenses Report</li>
            </ol>
        </div>
    </div>

    <!-- Data-validation -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="panel-title">Today Expenses Report ( {{date('d-F-Y')}} )</h3>
                            <h3 class="panel-title">
                                @php
                                    $month = date('d-F-Y');
                                    $total = DB::table('expenses')->where('expense_date', $month)->sum('expense_amount'); 
                                @endphp
                                Total Expense: {{ $total }}
                            </h3>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <a href="{{ route('new.expense') }}" class="btn btn-sm btn-info pull-right">New Expense</a>
                            <a href="{{ route('this.year.expense') }}" class="btn btn-sm btn-danger pull-right ex-btn">This Year</a>
                            <a href="{{ route('this.month.expense') }}" class="btn btn-sm btn-success pull-right ex-btn">This Month</a>
                            <a href="{{ route('today.expense') }}" class="btn btn-sm btn-warning pull-right ex-btn">Today</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                         
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($result as $row)
                                        <tr>
                                            <td>{{ $row->expense_name }}</td>
                                            <td>{{ $row->expense_amount }}</td>
                                            <td class="actions">
                                                <a href="{{ URL::to('view-expense/'.$row->id)}}" class="on-default edit-row btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ URL::to('edit-expense/'.$row->id)}}" class="on-default edit-row btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ URL::to('delete-expense/'.$row->id)}}" id="delete-warning" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- End Row -->


@endsection