@extends('admin.layouts.master')

@section('content')
    <input type="hidden" value="{{$activePage = 'accountsIndex', $title = 'Income - Nafia Garments'}}">
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('income-create'))
        <!-- <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Create A New Income</div>
                    <form method="POST" action="incomestore">
                        @csrf
                        <div class="row">
                                      <div class="col-md-6 form-group mb-3">
                                    <label for="serialnumber">Serial Number</label>
                                    <input class="form-control" id="serialnumber" name="serialnumber" type="number"
                                           placeholder="Enter serial number" required/>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="description">Description</label>
                                    <input class="form-control" id="description" name="description" step="0" min="0.00"
                                           type="text"
                                           placeholder="Enter description" required/>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="debit">Debit</label>
                                    <input class="form-control" id="debit" name="debit" step="0" min="0.00"
                                           type="number"
                                           placeholder="Enter Amount" required/>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="credit">Credit</label>
                                    <input class="form-control" id="credit" name="credit" type="number" required/>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Enter Date</label>
                                    <input class="form-control" id="date" name="date" type="date" required/>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="lastName1">Select Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach(\App\Models\Category::all() as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                    </form>
                    @if (isset($errors) && count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div> -->
        @endif
        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">All Incomes</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                 <th scope="col">#</th>
                                <th scope="col">Serial Number</th>
                            
                                <th scope="col">Particular</th>
                                    <th scope="col">Debit</th>
                                <th scope="col">Credit</th
                                <th scope="col">Date</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody>
                            @foreach($incomes as $item)
                                <tr>
                                   <th scope="row">{{$count++}}</th>
                                    <td>{{$item->serialnumber}}</td>
                                   
                                    <td>{{$item->description}}</td>
                                      <td>{{$item->debit}}</td>
                                    <td>{{$item->credit}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('income-edit'))
                                        <button class="text-success mr-2 btn btn-info" data-toggle="modal"
                                                data-target="#incomesModal{{$item->id}}" href="#"><i
                                                class="nav-icon i-Pen-2 font-weight-bold"></i></button>
                                        @endif
                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->hasPermissionTo('income-delete'))
                                        <form action="{{route('income.destroy',$item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href="#"><i
                                                    class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                        </form>
                                            @endif
                                    </td>
                                </tr>
                                <div class="modal fade" id="incomesModal{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    Edit {{$item->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('income.update',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                         <div class="col-md-6 form-group mb-3">
                                    <label for="description">Description</label>
                                    <input class="form-control" id="description" name="description" step="0" min="0.00"
                                           type="text"value="{{$item->description}}"
                                           placeholder="Enter description" required/>
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label for="debit">Debit</label>
                                    <input class="form-control" id="debit" name="debit" step="0" min="0.00" value="{{$item->debit}}"
                                           type="number"
                                           placeholder="Enter Amount" required/>
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label for="credit">Credit</label>
                                    <input class="form-control" id="credit" value="{{$item->credit}}" name="credit" type="number" required/>
                                </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="firstName1">Enter Date</label>
                                                            <input class="form-control" id="date" name="date"
                                                                   value="{{$item->date}}" type="date"/>
                                                        </div>
                                                        <div class="col-md-6 form-group mb-3">
                                                            <label for="lastName1">Select Category</label>
                                                            <select name="category_id" id="" class="form-control">
                                                                @foreach(\App\Models\Category::all() as $item)
                                                                    <option value="{{$item->id}}" {{$item->id == $item->category_id ? 'selected' : ''}}>{{$item->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$incomes->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
