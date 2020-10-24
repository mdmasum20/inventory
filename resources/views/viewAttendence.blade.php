@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">All Attendence</li>
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
                            <h3 class="panel-title">All Attendence - ( {{ $attendance_date }} )</h3>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('take.attendence') }}" class="btn btn-sm btn-info pull-right">Add New</a>
                            <a href="{{ route('all.attendence') }}" class="btn btn-sm btn-success pull-right ex-btn">All Attendence</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>                         
                                <tbody>
                                    @php 
                                        $i = 0;
                                        $all_att = DB::table('attendences')
                                                    ->join('employees', 'attendences.employee_id', 'employees.id')
                                                    ->where('attendance_date', $attendance_date)
                                                    ->select('attendences.attendance', 'employees.name', 'employees.photo')
                                                    ->get(); 
                                    @endphp
                                    @foreach($all_att as $row)
                                    	@php $i++; @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                <img src="{{ URL::to($row->photo) }}" style="height: 30px; width: 30px;">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            @if($row->attendance == 'Present')
                                                <td>
                                                    <span class="badge badge-success">{{ $row->attendance }}</span>
                                                </td>
                                            @elseif($row->attendance == 'Absence')
                                                <td>
                                                    <span class="badge badge-Danger">{{ $row->attendance }}</span>
                                                </td>
                                            @endif
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