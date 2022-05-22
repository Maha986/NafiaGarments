@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'sizeIndex', $title = 'Edit Size - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Sizes</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Edit Batch</div>
                        <form class="forms-sample" method="POST" action="{{ route('batch.update',$batch) }}">
                            @csrf()
                            @method('PUT')
                            <div class="form-group">
                                <label>Edit Name</label>

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Batch Name" value="{{ $batch->name }}" aria-label="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Edit Number</label>

                                <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Enter Batch Number" value="{{ $batch->number }}" aria-label="number">
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Edit Date</label>
                                <input type="datetime-local" name="date" class="form-control @error('date') is-invalid @enderror"  value="{{ date('Y-m-d\TH:i', strtotime($batch->date)) }}" aria-label="date">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Edit Labour Cost</label>

                                <input type="text" name="labour_cost" class="form-control @error('labour_cost') is-invalid @enderror" placeholder="Enter Labour Cost" value="{{ $batch->labour_cost }}" aria-label="labour_cost">
                                @error('labour_cost')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Edit Transportation Cost</label>

                                <input type="text" name="transportation_cost" class="form-control @error('transportation_cost') is-invalid @enderror" placeholder="Enter New Transportation Cost" value="{{ $batch->transportation_cost }}" aria-label="transportation_cost">
                                @error('transportation_cost')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Edit Other Cost - 1</label>

                                <input type="text" name="other_cost_one" class="form-control @error('other_cost_one') is-invalid @enderror" placeholder="Enter New Other Cost - 1" value="{{ $batch->other_cost_one }}" aria-label="other_cost_one">
                                @error('other_cost_one')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>New Other Cost - 2</label>

                                <input type="text" name="other_cost_two" class="form-control @error('other_cost_two') is-invalid @enderror" placeholder="Enter Other Cost - 2" value="{{ $batch->other_cost_two }}" aria-label="other_cost_two">
                                @error('other_cost_two')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Owner</label>

                                <input type="string" name="owner" class="form-control @error('owner') is-invalid @enderror" placeholder="Enter Owner Name" value="{{ $batch->owner }}" aria-label="owner">
                                @error('owner')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>

                                <input type="string" name="vendor" class="form-control @error('vendor') is-invalid @enderror" placeholder="Enter Vendor Name" value="{{ $batch->vendor }}" aria-label="vendor">
                                @error('vendor')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div>
@endsection

@section('page_css')
    <link rel="stylesheet" href="{{asset('admin/css/plugins/toastr.css')}}" />
@endsection
@section('page_script')
    <script src="{{ asset('admin/js/plugins/toastr.min.js') }}"></script>
{{--    <script src="{{asset('admin/js/scripts/toastr.script.min.js')}}"></script>--}}
@endsection
