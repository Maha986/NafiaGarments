@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'bannerIndex', $title = 'Banner - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Menu Banners</h4>
            </div>
        </div>

        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Banner</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create banners'))

                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menubanner as $menubann)
                                    <tr>
                                        <td>{{$menubann->id}}</td>
                                        <td> {{ $menubann->key }} </td>
                                        <td>
                                            <div style="width:75px; height: 75px; font-size: 0;">
                                                <img style="width:300px; height: 85px;"src="{{ asset('/images/banner2/'.$menubann->value) }}" alt="Banner not found" />
                                            </div>
                                        </td>
                                        <td> {{ $menubann->status == 0 ? 'Active':'Inactive' }} </td>
                                        <td>{{ \Carbon\Carbon::parse($menubann->created_at)->diffForHumans() }}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit banners'))
                                            <a href="editmenubanner/{{$menubann->id}}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                         
                                           
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <div style="float:right; margin-right: 1%;">

                                                        @php
         $menubanner = App\Models\menubanner::latest()->first();
         $menubannid = $menubanner->id;
          
        @endphp
        @if( $menubannid < '4' )
                            <a href="{{url('menubanner')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Menu Banner</a>
                                    @else
                                    <h2></h2>
                                    @endif
                            <br> <br>
                        </div>

                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Value</th>
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