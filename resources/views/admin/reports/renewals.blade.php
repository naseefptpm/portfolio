@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Renewals Due Date Reports</h3>
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
          <form method="get" action="{{ route('report.renewalsreport') }}" id="myForm">
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
                          <label for="lastName1">From Date</label>

                          <input type="date" class="form-control" name="fromdate" id="fromdate" required=""> </div>

                    </div>
                
                    <div class="col-md-3" >

                      <div class="form-group">
                          <label for="lastName1">To Date</label>

                          <input type="date" class="form-control" name="todate" id="todate" required=""> </div>

                    </div>

                    <div class="col-md-3" >

                 
                      <button type="submit" style=" width: 150px; margin-top: 30px;" class="btn btn-primary">Reports</button>


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
           


{{-- 
           <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Renewals Due Date Reports</h4>
       
        <div class="box-body no-padding">

            <div class="table-responsive">

              <table class="table table-hover">
                <tr>
                   <th>Expired</th> 
                  <th>Deal No.</th>
                  <th>Portfolio No</th>
                  <th>Client No</th>
                  <th>Plot No</th>
                  <th>Date</th>
                  <th>Expired At</th>



                </tr>

                @foreach($pailc as $plot)
                <tr>
                  <th>PAI Leasing Contract Expired</th>

                  <td>{{$plot->id}}</td>
                  <td>{{$plot->portfoliono}}</td>
                  <td>{{$plot->clientno}}</td>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->date}}</td>
                  <td>{{$plot->pai_lc_expiry}}</td>


                  
                </tr>
                @endforeach

                @foreach($fiex as $plot)
                <tr>
                  <th>fire Insurance Expired</th>

                  <td>{{$plot->id}}</td>
                  <td>{{$plot->portfoliono}}</td>
                  <td>{{$plot->clientno}}</td>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->date}}</td>
                  <td>{{$plot->fi_expiry}}</td>


                  
                </tr>
                @endforeach

                @foreach($flex as $plot)
                <tr>
                  <th>fire License Expired</th>

                  <td>{{$plot->id}}</td>
                  <td>{{$plot->portfoliono}}</td>
                  <td>{{$plot->clientno}}</td>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->date}}</td>
                  <td>{{$plot->fl_expiry}}</td>


                  
                </tr>
                @endforeach

               

                @foreach($pmoj as $plot)
                <tr>
                  <th>Power of Attorney MOJ Expired</th>

                  <td>{{$plot->id}}</td>
                  <td>{{$plot->portfoliono}}</td>
                  <td>{{$plot->clientno}}</td>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->date}}</td>
                  <td>{{$plot->poa_warba_expiry}}</td>


                  
                </tr>
                @endforeach

                @foreach($pwab as $plot)
                <tr>
                  <th>Power of Attorney Warba Expired</th>

                  <td>{{$plot->id}}</td>
                  <td>{{$plot->portfoliono}}</td>
                  <td>{{$plot->clientno}}</td>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->date}}</td>
                  <td>{{$plot->poa_moj_expiry}}</td>


                  
                </tr>
                @endforeach

            
            
              </table>

            </div>
        </div> 
             
              
        

                 
         
             </div>
           </div>
           <!-- /.box-header -->
           
       
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