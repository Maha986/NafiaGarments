@extends('admin.layouts.master')
@section('content')
    <input type="hidden" value="{{$activePage = 'batchIndex', $title = 'Create Batch - Nafia Garments'}}">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Colours</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create New Batch</div>
                        <form class="forms-sample" method="POST" action="{{ route('batch.store') }}">
                            @csrf()
                            <div class="form-group">
                                <label>Batch Name</label>

                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter New Batch Name" value="{{ old('name') }}" aria-label="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @php

  $batchii = App\Models\Batch::all()->last();
       $batchii->id+1;

                            @endphp
                            <div class="form-group">
                                <label>Batch Number</label>

                                <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Enter New Batch Number" value=" {{$batchii->id+1}}" aria-label="number">
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Batch Purchase Date</label>

                                <input type="datetime-local" name="date" class="form-control @error('date') is-invalid @enderror" placeholder="Enter New Batch Date" value="{{ old('date') }}" aria-label="date">
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Batch Labour Cost</label>

                                <input type="text" name="labour_cost" class="form-control @error('labour_cost') is-invalid @enderror" placeholder="Enter New Labour Cost" value="{{ old('labour_cost') }}" aria-label="labour_cost">
                                @error('labour_cost')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Batch Transportation Cost</label>

                                <input type="number" name="transportation_cost" class="form-control @error('transportation_cost') is-invalid @enderror" placeholder="Enter New Transportation Cost" value="{{ old('transportation_cost') }}" aria-label="transportation_cost">
                                @error('transportation_cost')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Head(Cost 1)</label>

                                <input type="string" name="headcost1" class="form-control @error('owner') is-invalid @enderror" placeholder="Enter New Owner Name" value="{{ old('owner') }}" aria-label="owner">
                                @error('owner')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

<div class="form-group">
                                <label>Batch Other Cost - 1</label>

                                <input type="number" name="other_cost_one" class="form-control @error('other_cost_one') is-invalid @enderror" placeholder="Enter New Other Cost - 1" value="{{ old('other_cost_one') }}" aria-label="other_cost_one">
                                @error('other_cost_one')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="form-group">
                                <label>Head(Cost 2)</label>

                                <input type="string" name="headcost2" class="form-control @error('vendor') is-invalid @enderror" placeholder="Enter Supplier Name" value="{{ old('vendor') }}" aria-label="vendor">
                                @error('vendor')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

<div class="form-group">
                                <label>Batch Other Cost - 2</label>

                                <input type="text" name="other_cost_two" class="form-control @error('other_cost_two') is-invalid @enderror" placeholder="Enter New Other Cost - 2" value="{{ old('other_cost_two') }}" aria-label="other_cost_two">
                                @error('other_cost_two')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                           <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
