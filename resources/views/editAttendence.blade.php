@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Attendence</li>
            </ol>
        </div>
    </div>

    <!-- Data-validation -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	@php
                    	$att_date = DB::table('attendences')
			    				 ->where('attendance_date', $attendance_date)
			    				->first();
                    @endphp
                    <form action="{{url('/update-attendence')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 class="panel-title">Update Attendence - ( {{ $attendance_date }} )</h3>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <button type="submit" class="btn btn-sm btn-info pull-right">Update Attendence</button>
                                <a href="{{ route('all.attendence') }}" class="btn btn-sm btn-success pull-right ex-btn">All Attendence</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!-- <table id="datatable" class="table table-striped table-bordered"> -->
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Attendence</th>
                                        </tr>
                                    </thead>

                                    @php
                                    	$all_att = DB::table('attendences')
							    				 ->join('employees', 'attendences.employee_id', 'employees.id')
							    				 ->where('attendance_date', $attendance_date)
							    				 ->select('attendences.attendance', 'employees.*')
							    				->get();
                                    @endphp
                                    <tbody>
                                        @foreach($all_att as $row)
                                            <tr>
                                                <td>
                                                    <img src="{{ URL::to($row->photo) }}" style="height: 30px; width: 30px;">
                                                </td>
                                                <td>{{ $row->name }}</td>
                                                <input type="hidden" name="id[]" value="{{ $row->id }}">
                                                <td>
                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Present" required <?php if ($row->attendance == 'Present'){echo "checked";} ?> > Present

                                                    <input type="radio" name="attendance[{{ $row->id }}]" value="Absence" required <?php if ($row->attendance == 'Absence'){echo "checked";} ?>> Absence
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>     
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- End Row -->


@endsection