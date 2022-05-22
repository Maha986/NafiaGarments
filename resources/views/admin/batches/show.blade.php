@extends('admin.layouts.master')

@section('content')
    <input type="hidden" value="{{$activePage = 'batchIndex', $title = 'Show - Nafia Garments'}}">

        <h4>Full Information</h4>
        <br />

        <div class="row">
            <div class="col-md-4 col-6">
                <div class="mb-4">
                    <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i> Labour Cost</p><span>{{$batch->labour_cost}}</span>
                </div>
                <div class="mb-4">
                    <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i> Transportation Cost</p><span>{{$batch->transportation_cost}}</span>
                </div>
            </div>

            @if($batch->other_cost_one != null || $batch->other_cost_two != null || $batch->owner != null || $batch->vendor != null)
                <div class="col-md-4 col-6">

                    @if($batch->other_cost_one != null)
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Other Cost - 1 </p><span>{{$batch->other_cost_one}}</span>
                        </div>
                    @endif

                    @if($batch->other_cost_two != null)
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Other Cost - 2</p><span>{{$batch->other_cost_two}}</span>
                        </div>
                    @endif

                    @if($batch->owner != null)
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Owner</p><span>{{$batch->owner}}</span>
                        </div>
                    @endif

                    @if($batch->vendor != null)
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Vendor</p><span>{{$batch->vendor}}</span>
                        </div>
                    @endif
                </div>
            @endif

            <div class="col-md-4 col-6">
                <div class="mb-4">
                    <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Created At</p><span>{{$batch->created_at->diffForHumans()}}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5"> </div>
            <div class="col-sm-2">
                <a href="{{route('batch.index')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                class="nav-icon font-weight-bold"></i>Go Back</a>
            </div>
            <div class="col-sm-5"> </div>
        </div>
@endsection
