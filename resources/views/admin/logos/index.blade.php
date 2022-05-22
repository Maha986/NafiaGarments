@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'logoIndex', $title = 'Logo - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All logos</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Logo</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create logos'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('logo.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Logo</a>
                            <br> <br>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logos as $logo)
                                    <tr>
                                        <td>{{$logo->id}}</td>
                                        <td>
                                            <div style="width:75px; height: 75px; font-size: 0;">
                                                <img src="{{ asset('storage/images/logos/'.$logo->value) }}" alt="logo not found" />
                                            </div>

                                        </td>
                                        <td> {{ $logo->status == 1 ? 'Active':'Inactive' }} </td>
                                        <td>{{$logo->created_at->diffForHumans()}}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit logos'))
                                            <a href="{{route('logo.edit',$logo)}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete logos'))
                                            <form method="POST" action="{{route('homesetting.destroy',$logo)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('logos status'))
                                                @if($logo->status == 0)
                                                    <form method="POST" action="{{route('homesetting.status',$logo)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="logo" value="logo"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($logo->status == 1)
                                                    <form method="POST" action="{{route('homesetting.status',$logo)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="logo" value="logo"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> InActive </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Status</th>
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
