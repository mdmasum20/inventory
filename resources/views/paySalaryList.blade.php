@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">This Month Salary List</li>
            </ol>
        </div>
    </div>

    <!-- Data-validation -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="panel-title salary-heading">This Month Salary List</h3>
                            <h2 class="salary-heading">{{ date('F - Y') }}</h2>
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
                                        <th>Month</th>
                                        <th>Salary</th>
                                        <th>Advanced</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                         
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($adv_check as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td><span class="badge badge-success">{{ date('F', strtotime('-1 months')) }}</span></td>
                                            <td>{{ $row->salary }}</td>
                                            <td>Ase</td>
                                            <td class="actions">
                                                <a href="{{ URL::to('view-employee/'.$row->id)}}" class="on-default edit-row btn btn-primary btn-sm"><i class="fa fa-cart"></i> Pay Now</a>
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