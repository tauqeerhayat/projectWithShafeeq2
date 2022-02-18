@extends('layouts.app')

@section('title')
    <title>Role</title>
@endsection

@section('onPageStyles')
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection


@section('content')

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Record Will Be permennt Deleted, Are You sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmDelete">Delete</button>
            </div>
        </div>
        </div>
    </div>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Role</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.role')}}">Users</a>
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
                                                    {{-- <h4 class="card-title"><a href="{{ route('admin.role.create')}}" class="btn btn-bg-gradient-x-purple-blue mr-1 mb-1">Create New Role</a></h4> --}}
                                                    @if (Session::has('status'))
                                                        <span class="text-success">{{Session::get('status')}}</span>
                                                    @endif
                                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content collapse show ">
                                                    <div class="card-body card-dashboard">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered zero-configuration" id="roleTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Role</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($users as $key => $role)
                                                                    <tr>
                                                                        <td>{{ ++$key}}</td>
                                                                        <td>{{ $role->username}}</td>
                                                                        <td>{{ $role->email}}</td>
                                                                        <td class="text-center"><a href="{{route('admin.user.show', $role->id)}}" class="btn btn-sm btn-primary">View</a></td>
                                                                        <td class=" text-center">
                                                                            <a href="{{ route('admin.user.edit', $role->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteBtn" data-role-id="{{ $role->id}}">
                                                                                Delete
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Role</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
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

    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#roleTable').on('click', '.deleteBtn', function(){
                var id = $(this).attr("data-role-id");
                $('#deleteModal').modal('show').attr('modal-role-id',id);
            });
            $('#confirmDelete').on('click',function(){
                var vid = $('#deleteModal').attr('modal-role-id');
                // console.log(vid);
                // alert(siteUrl)
                $.ajax({
                    type:'DELETE',
                    url:`${siteUrl}role/delete/${vid}`,
                    data:{},
                    success:function(data) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>

@endsection
