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
                            <a href="{{ route('new.product') }}" class="btn btn-sm btn-info pull-right">Add New</a>
                            <a href="{{ route('export.product') }}" class="btn btn-sm btn-success pull-right ex-btn">Export</a>
                            <a href="{{ route('import.product') }}" class="btn btn-sm btn-warning pull-right ex-btn">Import</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Selling Price</th>
                                        <th>Godown</th>
                                        <th>Route</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                         
                                <tbody>
                                    @foreach($Product_result as $row)
                                        <tr>
                                            <td>
                                                <img src="{{ URL::to($row->product_image) }}" style="height: 30px; width: 30px;">
                                            </td>
                                            <td>{{ $row->product_name }}</td>
                                            <td>{{ $row->product_code }}</td>
                                            <td>{{ $row->selling_price }}</td>
                                            <td>{{ $row->product_place }}</td>
                                            <td>{{ $row->product_route }}</td>
                                            <td class="actions">
                                                <a href="{{ URL::to('view-product/'.$row->id)}}" class="on-default edit-row btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ URL::to('eid-product/'.$row->id)}}" class="on-default edit-row btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ URL::to('delete-product/'.$row->id)}}" id="delete-warning" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>

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