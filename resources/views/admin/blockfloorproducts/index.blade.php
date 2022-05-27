@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'floorIndex', $title = 'Block Floor - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View All Block Floors</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Block Floor</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create floors'))
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{route('floor.create')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Add New Block Floor</a>
                            <br> <br>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Banner - 1</th>
                                    <th>Banner - 2</th>
                                    <th>Featured</th>
                                    <th>Icon</th>
                                    <th>Colour</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blockfloorproducts as $blockfloorproduct)
                                    <tr>
                                        <td>{{$blockfloorproduct->id}}</td>
                                        <td> {{ $blockfloorproduct->title }} </td>
                                        <td>
                                            <div style="width:175px; height:75px; font-size: 0;">
                                                <img src="{{ asset('storage/images/block_floor_products/'.$blockfloorproduct->banner_1) }}" alt="Banner not found" />
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:175px; height:75px; font-size: 0;">
                                                <img src="{{ asset('storage/images/block_floor_products/'.$blockfloorproduct->banner_2) }}" alt="Banner not found" />
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width:75px; height: 75px; font-size: 0;">
                                                <img src="{{ asset('storage/images/block_floor_products/'.$blockfloorproduct->featured_banner) }}" alt="Banner not found" />
                                            </div>
                                        </td>
                                        <td class="text-center"><div class="{{$blockfloorproduct->icon}}"></div></td>
                                        <td>
                                            <div style="background-color: {{ $blockfloorproduct->colourCode }}; width:50px; height: 50px; font-size: 0;">

                                            </div>

                                        </td>
                                        <td> {{ $blockfloorproduct->status == 1 ? 'Active':'Inactive' }} </td>
                                        <td>{{ \Carbon\Carbon::parse($blockfloorproduct->created_at)->diffForHumans() }}</td>
                                        <td>
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit floors'))
                                            <a href="{{ route('floor.edit',$blockfloorproduct->id) }}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                    class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete floors'))
                                            <form method="POST" action="{{ route('floor.destroy',$blockfloorproduct->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                        class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                            </form>
                                            @endif
                                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('floors status'))
                                                @if($blockfloorproduct->status == 0)
                                                    <form method="POST" action="{{route('floor.status',$blockfloorproduct->id)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="floor" value="floor"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                class="nav-icon font-weight-bold"></i> Active </button>
                                                    </form>
                                                @elseif($blockfloorproduct->status == 1)
                                                    <form method="POST" action="{{route('floor.status',$blockfloorproduct->id)}}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="floor" value="floor"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
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
                                    <th>Title</th>
                                    <th>Banner - 1</th>
                                    <th>Banner - 2</th>
                                    <th>Featured</th>
                                    <th>Icon</th>
                                    <th>Colour</th>
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
