 <div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                        <div style="float:right; margin-right: 1%;">
                            <a href="{{url('admin/product')}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>View All Details</a>
                            <br> <br>
                        </div>




                          <div style="float:right; margin-right: 1%;">
                            <a href=" {{route('productindex_pdf5',['pro1'=>$pro1,'pro2'=>$pro2,'pro3'=>$pro3,'pro4'=>$pro4,'pro5'=>$pro5,'products'=>$products])}}" class="btn btn-raised btn-raised-primary m-1" style="color: white;"><i
                                    class="nav-icon font-weight-bold"></i>Export PDF</a>
                            <br> <br>
                        </div>


<div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                   <th style="text-align:left;">#</th>
                                    <th style="text-align:left;">{{$pro1}}</th>
                                    <th style="text-align:left;">{{$pro2}}</th>
                                      <th style="text-align:left;">{{$pro3}}</th>
                                      <th style="text-align:left;">{{$pro4}}</th>
                                      <th style="text-align:left;">{{$pro5}}</th>
                                  
                              
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>
        <td>#</td>
          <td>
               
       {{$pro->$pro1}}
          </td>

          <td>
               
       {{$pro->$pro2}}
          </td>

             <td>
               
       {{$pro->$pro3}}
          </td>

           <td>
               
       {{$pro->$pro4}}
          </td>

           <td>
               
       {{$pro->$pro5}}
          </td>


           
      
          


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                               
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>