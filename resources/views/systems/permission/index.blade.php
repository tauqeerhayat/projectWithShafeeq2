@extends('layouts.app')

@section('title')
    <title>Permission</title>
@endsection

@section('onPageStyles')
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection


@section('content')

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="deletePerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Role</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                        <p>Do you want to remove this Role?</p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary " id="delete-per-btn">Save changes</button>
                                                                                        {{-- <a href="{{url('role/delete/'.$role->id)}}" class="btn btn-danger ">Delete</a> --}}
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
                    <h3 class="content-header-title">Permission</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.permission')}}">Permission</a>
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
                                                    <h4 class="card-title"><a href="{{ route('admin.permission.create')}}" class="btn btn-bg-gradient-x-purple-blue mr-1 mb-1">Create New Permission</a></h4>
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
                                                            <table class="table table-striped table-bordered zero-configuration" id="perTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Name</th>
                                                                        <th>Guard Name</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($permission as $key => $role)
                                                                    <tr>
                                                                        <td>{{ ++$key}}</td>
                                                                        <td>{{ $role->name}}</td>
                                                                        <td class="text-center"><a href="{{ route('admin.permission.show', $role->id) }}" class="btn btn-sm btn-primary">View</a></td>
                                                                        <td class=" text-center">
                                                                            <a href="{{ route('admin.permission.edit', $role->id)}}" class="btn btn-sm btn-success">Edit</a>
                                                                            {{-- <a href="{{url('permission/delete/'.$role->id)}}" class="btn btn-sm btn-danger ">Delete</a> --}}
                                                                            <!-- Button trigger modal -->
                                                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger deletePerBtn" data-permission-id="{{$role->id}}">
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
    <!-- END: Page JS-->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#perTable').on('click', '.deletePerBtn', function(){
                var p_id = $(this).attr('data-permission-id');
                // console.log(p_id);
                $('#deletePerModal').modal('show').attr('modal-permission-id', p_id);
                // console.log(p_id);
            });
            $('#delete-per-btn').on('click', function(){
                var id = $('#deletePerModal').attr('modal-permission-id');
                // console.log(id);
                $.ajax({
                    type:"DELETE",
                    url: `${siteUrl}permission/delete/${id}`,
                    data:{},
                    success:function(data){
                        // alert("done");
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
