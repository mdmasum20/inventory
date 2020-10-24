@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Category List</li>
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
                            <h3 class="panel-title">Category List</h3>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <a href="{{ route('new.category') }}" class="btn btn-sm btn-info pull-right">Add New</a>
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
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                         
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach($Category_result as $row)
                                    	@php $i++; @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $row->cat_name }}</td>
                                            @if($row->cat_status == 1)
                                            	<td>
                                            		<span class="badge badge-success">Active</span>
                                            		<a href="{{ URL::to('active-deactive-category/'.$row->id)}}" class="on-default edit-row btn btn-danger btn-sm btn-speace"> <i class="fa fa-remove"></i></a>
                                            	</td>
                                            @else
                                            	<td>
                                            		<span class="badge badge-Danger">Deactive</span>
                                            		<a href="{{ URL::to('active-deactive-category/'.$row->id)}}" class="on-default edit-row btn btn-success btn-sm btn-speace"><i class="md md-done"></i></a>
                                            	</td>
                                            @endif
                                            <td class="actions">
                                                <a href="{{ URL::to('delete-category/'.$row->id)}}" id="delete-warning" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
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