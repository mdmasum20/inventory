@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">All Employee</li>
            </ol>
        </div>
    </div>

    <!-- Data-validation -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 class="panel-title">All Employee</h3>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('new.employee') }}" class="btn btn-sm btn-info pull-right">Add New</a>
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Salary</th>
                                        <th>Salary Pay</th>
                                    </tr>
                                </thead>

                         
                                <tbody>
                                	@php $i = 0; @endphp
                                    @foreach($Employees_result as $row)
                                        <tr>
                                            <td>
                                            	@php $i++; @endphp
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->city }}</td>
                                            <td>{{ $row->salary }}</td>
                                            <td class="actions">
                                                <a href="{{ URL::to('view-employee/'.$row->id)}}" class="on-default edit-row btn btn-primary btn-sm">Pay</a>

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