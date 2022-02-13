@extends('layouts.app')

@section('title')
    <title>Edit Permission</title>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Edit Permission</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.role')}}">Permission</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Edit</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <section id="configuration">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body card-dashboard">
                                                        <form method="POST" action="{{route('admin.permission.update', $reqPer->id)}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name" class="form-label">Role Name</label>
                                                                <input type="text" class="form-control" name="name" value="{{$reqPer->name}}">
                                                                @error('name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-success">Update Role</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('onPageScript')
    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <!-- END: Page JS-->
@endsection
