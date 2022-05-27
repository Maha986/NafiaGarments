<div class="row mb-4">
          
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title mb-3" style="display: inline;">Selected Fields</h4>
                       

   
                      
                        <div class="table-responsive">
                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                <thead>
                                <tr>
                                 
                                    <th>{{$pro1}}</th>
                                  
                                  
                                
                                </tr>
                                </thead>
                                <tbody>
                               
            @foreach($products as $pro)
                                    <tr>

          <td>
               
       {{$pro->$pro1}}
          </td>


                    </tr>
                      @endforeach
                  
                            
                                   

                                </tbody>
                                <tfoot>
                                <tr>
                                   <th>#</th>
                                   
                                    <th>{{$pro1}}</th>
                               
                                  

                                   
                                    
                                   
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>