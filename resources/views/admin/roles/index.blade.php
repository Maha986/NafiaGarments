@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'roleIndex', $title = 'Roles- Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Roles</h4>
            </div>
        </div>
        <!-- end of row-->

{{\Spatie\Permission\Models\Permission::all()}}

        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Role</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create roles'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('role.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Role</a>
                            <br> <br>
                        </div>
                        @endif



                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <span class="badge badge-primary" style="font-size:small; margin-top:10px;"> {{ $permission->name }} </span>
                                            @endforeach
                                        </td>
                                        <td>{{$role->created_at->diffForHumans()}}</td>
                                        @if(count($role->permissions) !== 0)
                                            <td>
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit roles'))
                                                <a href="{{route('role.edit',$role)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete roles'))
                                                <form method="POST" action="{{route('role.destroy',$role)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                            class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                                </form>
                                                @endif
                                            </td>

                                            @else
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Roles</th>
                                    <th>Permissions</th>
                                    <th>Created At</th>
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


@endsection
@section('page_css')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/toastr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin-assets/css/plugins/datatables.min.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
