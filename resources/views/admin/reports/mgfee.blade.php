@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Management Fees Reports</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Reports</li>
								<li class="breadcrumb-item active" aria-current="page">Reports</li>
							</ol>
						</nav>

					</div>

				</div>


			</div>
		</div>
       
        @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
		<!-- Main content -->
		<section class="content">

		  <div class="row">

			<div class="col-12">
			
			  <!-- /.box -->
			</div>

			<div class="col-12">
			  <div class="box">
				<div class="box-header with-border">
          <form method="get" action="{{ route('report.mgfeereport') }}" id="myForm">
            @csrf
                    <div class="row">

                      <div class="col-md-3" >

                        <div class="form-group">
                            <label for="lastName1">Portfolio No</label>

                            

                           <select class="custom-select form-control" id="myForm" name="id">
                            <option   value="" > Select </a></option>

                            @foreach($portfolios as $port) 


                                <option   value="{{$port->id}}" > {{$port->id}} </a></option>
                                @endforeach

                            </select>


                          </div>
                  
                       
                      </div>

                      <div class="col-md-3" >

                        <div class="form-group">
                            <label for="lastName1">Calculation Period</label>

                            

                           <select class="custom-select form-control" id="myForm" name="calcprd">
                            <option   value="" > Select </a></option>

                            <option   value="Jan - March" > Jan - March</a></option>
                            <option   value="April - June" > April - Jun</a></option>
                            <option   value="July - Sep" > July - Sep</a></option>
                            <option   value="Oct - Dec" > Oct - Dec</a></option>
    

                            </select>


                          </div>
                  
                       
                      </div>

                      <div class="col-md-3" >

                        <div class="form-group">
                            <label for="lastName1">Year</label>
  
                             <input class="form-control" name="year" type="number" id="datepicker"  min="1900" max="2099" step="1" value="2021" required=""> 
                      </div>
                      </div>

                    {{-- <div class="col-md-3" >

                      <div class="form-group">
                          <label for="lastName1">From Date</label>

                          <input type="date" class="form-control" name="fromdate" id="fromdate" required=""> </div>

                    </div>
                
                    <div class="col-md-3" >

                      <div class="form-group">
                          <label for="lastName1">To Date</label>

                          <input type="date" class="form-control" name="todate" id="todate" required=""> </div>

                    </div> --}}

                    <div class="col-md-3" >

                 
                      <button type="submit" name="action" value="report" style=" width: 100px; margin-top: 30px; margin-right: 10px;" class="btn btn-primary">Reports</button>
                      <button type="submit" name="action" value="export" style=" width: 100px; margin-top: 30px; " class="btn btn-success">Export</button>

                      </div>
                  </div>
                       
                    </div>
               

                  </form>	
                
             

                 
             <!-- <div class="lookup lookup-circle lookup-right">
               <input type="text" name="search">
             </div> -->
             </div>
           </div>
           <!-- /.box-header -->
           



           {{-- <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Management Fees Reports</h4>
                    <div class="box-body no-padding">
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <tr>
                              <th>Sl No.</th>
                              <th>Portfolio No</th>
                              <th>Fee Calculation Method</th>
                              <th>Calculation Period</th>
                              <th>Management Fees</th>
                            
                            </tr>
    
                            @foreach($mgfee as $fee)
                            <tr>
    
                              <td>{{$fee->id}}</td>
                              <td>{{$fee->portfoliono}}</td>
                              <td>{{$fee->type}}</td>
                              <td>{{$fee->calcprd}}</td>
                              <td>{{$fee->mgfees}}</td>
                            </tr>
                            @endforeach
    
                          </table>
                        </div>
                    </div> 
                  </div>
                </div>
              </div> --}}

          
  


				
					<!-- <div class="lookup lookup-circle lookup-right">
					  <input type="text" name="search">
					</div> -->
       
				  </div>
				</div>
				<!-- /.box-header -->
                
			  
			  <!-- /.box -->
			</div>

			 

			
		  </div>
		  <!-- /.row -->
     
		</section>

  
		<!-- /.content -->
	  </div>
  </div>
 

            @endsection

     