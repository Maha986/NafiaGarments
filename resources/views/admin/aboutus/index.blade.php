@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'aboutIndex', $title = 'About - Nafia Garments'}}">
    <div class="main-content">
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>View About us</h4>
            </div>
        </div>
        <!-- end of row-->
        <div class="row mb-4">
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">About us</h4>
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('create aboutus'))
                            <div style="float:right; margin-right: 1%;">
                                <a href="{{route('aboutus.create')}}" class="btn btn-raised btn-raised-primary m-1 {{ count($abouts) == 1 ? 'disabled':''}}" style="color: white;" id="addnew" ><i
                                        class="nav-icon font-weight-bold"></i>Add New About us</a>
                                <br> <br>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%" id="tableId">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($abouts as $abouts)

                                    <tr>
                                        <td>{{$abouts->id}}</td>
                                        <td>{{$abouts->title}}</td>
                                        <td>
                                        <div class="col-md-3 form-group mb-3">
                                            <div style="width:75px; height: 75px; font-size: 0;">
                                                <img src="{{ asset('storage/images/about/'.$abouts->image) }}" alt="Image not found" />
                                            </div>
                                        </div>
                                        </td>
                                        <td>{{$abouts->description}}</td>
                                            <td> {{ $abouts->status == 1 ? 'Active':'Inactive' }} </td>
                                            <td>{{\Carbon\Carbon::parse($abouts->created_at)->diffForHumans()}}</td>
                                            <td>
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('edit aboutus'))
                                                <a href="{{ route('aboutus.edit',$abouts->id) }}" class="btn btn-raised btn-raised-primary m-1" style="color: white"><i
                                                        class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('delete aboutus'))
                                                <form method="POST" action="{{ route('aboutus.destroy',$abouts->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
                                                            class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                                </form>
                                                @endif
                                                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasPermissionTo('aboutus status'))
                                                    @if($abouts->status == 0)
                                                        <form method="POST" action="{{route('aboutus.status',$abouts->id)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="aboutus" value="aboutus"  class="btn btn-raised btn-raised-success m-1" style="color: white"><i
                                                                    class="nav-icon font-weight-bold"></i> Active </button>
                                                        </form>
                                                    @elseif($abouts->status == 1)
                                                        <form method="POST" action="{{route('aboutus.status',$abouts->id)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" name="aboutus" value="aboutus" class="btn btn-raised btn-raised-danger m-1" style="color: white"><i
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
                                    <th>Image</th>
                                    <th>Description</th>
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
<script type="text/javascript">
    $(document).ready(function () {
        var table = document.getElementById("tableId");
        if(table.tBodies[0].rows.length = 1) {
            document.getElementById(addnew).disabled=true;
            return true;
        }
    });
</script>
    <script src="{{ asset('admin-assets/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
   {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">--}}
    {{--    <script src="{{asset('admin/js/plugins/toastr.min.js')}}"></script>--}}
    {{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
    <script src="{{asset('admin-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts/datatables.script.min.js')}}"></script>
@endsection
