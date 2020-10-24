@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">All Customer</li>
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
		                    <h3 class="panel-title">All Customer</h3>
		                </div>
                		<div class="col-md-4 col-sm-4 col-xs-4">
                			<a href="{{ route('new.customer') }}" class="btn btn-sm btn-info pull-right">Add New</a>
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
                                        <th>Phone</th>
                                        <th>Shop Name</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                         
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($Customer_result as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->shopname }}</td>
                                            <td>{{ $row->address }}</td>
                                            <td class="actions">
                                                <a href="{{ URL::to('view-customer/'.$row->id)}}" class="on-default edit-row btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ URL::to('eid-customer/'.$row->id)}}" class="on-default edit-row btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ URL::to('delete-customer/'.$row->id)}}" id="delete-warning" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>

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