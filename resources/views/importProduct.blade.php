@extends('layouts.app')

@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Inventory !</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="active">Import Product</li>
            </ol>
        </div>
    </div>

    <!-- Form-validation -->
    <div class="row">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Import Product</h3></div>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="newEmployeeForm" method="post" action="{{ route('import') }}" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="firstname" class="control-label col-lg-2">Select File *</label>
                                <div class="col-lg-7">
                                    <input class=" form-control" id="product_import" name="product_import" type="file" required>
                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Import</button>
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
                        </form>
                    </div> <!-- .form -->

                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->

    </div> <!-- End row -->

                
@endsection