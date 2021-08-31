@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
<div class="container-full">

<!-- Main content -->

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Notifications</h4>
                <div class="row">
                     @foreach($portfolio as $portfoli) 
                    <a href="{{url('dash/view/'.$portfoli->id)}}">  <button  type="submit" style=" width: 150px; margin-top: 30px; margin-right:30px " class="btn btn-outline-secondary">Portfolio : {{$portfoli->id}}</button></a>
                      @endforeach
                  </div>

                {{-- <form method="get" action="{{ route('dash.view') }}" id="myForm">

                  <div class="row">
                   



                      <div class="col-md-6" >

                          <div class="form-group">
                              <label for="lastName1">Select Portfolio</label>

                                @csrf
                             <select class="custom-select form-control" id="myForm" name="id">
                               <option   value="" >---Select--- </a></option>

                              @foreach($portfolio as $portfolio) 
                                  <option   value="{{$portfolio->id}}"  > {{$portfolio->id}} </a></option>
                                  @endforeach

                              </select>

                        </div>

                        
                      </div>
                        <div style="padding-bottom:25px;">
                   
                      <button type="submit" style=" width: 150px; margin-top: 30px; " class="btn btn-primary">View</button>

                    </div>
                    
                     
                  </div>
             

                </form> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            Pending Tasks
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-hover">
                              <tr class="thead-dark">
                                <th>No.</th>
                                <th>Task </th>
                                <th>Client</th>
                                <th>Due Date</th>
                                <th>Action</th>

                              </tr>
                              @foreach($tasks as $task)

                              <tr class="alert alert-info">

      
                                <td >{{$task->id}}</td>                            

                                <td>{{$task->taskdesc}}</td>
                                <td>{{$task->client}}</td>
      
      
                      
                                <td> {{$task->duedate}} </td>
                                
                                <td> <a href="{{url('task/edit/'.$task->id)}}" class="btn btn-info"><i class="far fa-edit"></i></i>Edit</a>  </td>

                              </tr>

                          @endforeach

                          @foreach($overdue as $task)

                          <tr class="alert alert-danger">

  
                            <td >{{$task->id}}</td>                            

                            <td>{{$task->taskdesc}}</td>
                            <td>{{$task->client}}</td>
  
  
                  
                            <td> {{$task->duedate}} </td>
                            
                            <td> <a href="{{url('task/edit/'.$task->id)}}" class="btn btn-info"><i class="far fa-edit"></i></i>Edit</a>  </td>

                          </tr>

                      @endforeach
                          
                            </table>
      
                          </div>
                       
                    </div>
                    <div class="col-md-6">
                        <h5>
                            Upcoming Renewals
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                              <tr class="thead-dark">
                                <th>Client No.</th>
                                <th>Contract No </th>
                                <th>Document Type</th>
                                <th>Due Date</th>

                              </tr>
                              @foreach($pailc as $plot)

                              <tr class="alert alert-primary">
                                <td >{{$plot->clientno}}</td>                            
                                <td>{{$plot->id}}</td>
                                <td>PAI Leasing Contract</td>
                                <td>{{$plot->pai_lc_expiry}}</td>
                              </tr>
                             @endforeach

                             @foreach($fiex as $plot)

                             <tr class="alert alert-primary">
                               <td >{{$plot->clientno}}</td>                            
                               <td>{{$plot->id}}</td>
                               <td>fire Insurance</td>
                               <td>{{$plot->pai_lc_expiry}}</td>
                             </tr>
                            @endforeach

                            @foreach($flex as $plot)

                            <tr class="alert alert-primary">
                              <td >{{$plot->clientno}}</td>                            
                              <td>{{$plot->id}}</td>
                              <td>fire License</td>
                              <td>{{$plot->pai_lc_expiry}}</td>
                            </tr>
                           @endforeach

                           @foreach($pmoj as $plot)

                           <tr class="alert alert-primary">
                             <td >{{$plot->clientno}}</td>                            
                             <td>{{$plot->id}}</td>
                             <td>Power of Attorney MOJ</td>
                             <td>{{$plot->pai_lc_expiry}}</td>
                           </tr>
                          @endforeach

                          @foreach($pwab as $plot)

                          <tr class="alert alert-primary">
                            <td >{{$plot->clientno}}</td>                            
                            <td>{{$plot->id}}</td>
                            <td>Power of Attorney Warba</td>
                            <td>{{$plot->pai_lc_expiry}}</td>
                          </tr>
                         @endforeach
                          
                          
                            </table>
      
                          </div>
                        {{-- <div class="alert alert-info">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                                <b> Info - </b> This is a regular notification made with ".alert-info"</span>
                        </div>
                        <div class="alert alert-success">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                                <b> Success - </b> This is a regular notification made with ".alert-success"</span>
                        </div>
                        <div class="alert alert-warning">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                                <b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                        </div> --}}

                        <h5>
                         Alerts
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-hover">
                              <tr class="thead-dark">
                                <th>Plot No.</th>
                                <th>Client </th>
                                <th>Alert for</th>
                                <th>Due Date</th>

                              </tr>

                              <tr class="alert alert-danger">

      
                                <td >plain notification</td>                            

                                <td>plain notification</td>
                                <td>plain notification</td>
      
      
                      
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> </span> </td>
                                

                              </tr>

                          
                          
                            </table>
      
                          </div>
                    </div>
                </div>
                <br>
                <br>
                {{-- <div class="places-buttons">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <h4 class="card-title"> Select Portfolio
                                <p class="card-category">
                                    <small>Click to view notifications</small>
                                </p>
                            </h4>
                        </div>
                    </div>
                  
                   
                </div> --}}
              
            </div>
        </div>
        <!-- Mini Modal -->
      
        <!--  End Modal -->
    </div>
</div>




<!-- /.content -->
</div>
</div>

@endsection