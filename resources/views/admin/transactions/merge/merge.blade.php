@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Merge</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Transactions</li>
								<li class="breadcrumb-item active" aria-current="page">Merge</li>
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
          <div class="input-group">
            <div class="form-outline">
                  <form action="{{ url('/search/merge')}}" class="form-inline my-2 my-lg-0" type="get">

                  <input type="search" class="form-control rounded" name="query1" placeholder="search deals" aria-label="Search">
                </div>
                <button class="btn btn-outline-light my-2 my-sm-0"  type="submit"> <i class="ti-search"></i></button>
              </form>

             </div>
             <form method="get" action="{{ route('merge.create') }}" id="myForm">


            <div class="row">

               
              

                <div class="col-md-3" >


                    <div class="form-group">
                        <label for="lastName1">Deal No</label>


                          @csrf
                       <select class="custom-select form-control" id="myForm" name="id">
                        @foreach($plots as $plot) 


                            <option   value="{{$plot->id}}" selected > {{$plot->id}} </a></option>
                            @endforeach

                        </select>


                  </div>
              
                  
                </div>

                       
                <div class="col-md-3" >


                  <div class="form-group">
                      <label for="lastName1">Deal No</label>


                        @csrf
                     <select class="custom-select form-control" id="myForm" name="id2">
                      @foreach($plots as $plot) 


                          <option   value="{{$plot->id}}" selected > {{$plot->id}} </a></option>
                          @endforeach

                      </select>


                </div>
            
                
              </div>
             
              <button type="submit" style=" width: 150px; margin-top: 30px;" class="btn btn-primary">Merge</button>

                
              </div>

          
               
          </div>
       

          </form>	
                  {{-- <div class="row">

                    <div class="col-md-3" >


                  <div class="form-group">
                  <form action="{{ url('/search/merge')}}" class="form-inline my-2 my-lg-0" type="get">
                    <input type="search" class="form-control rounded" name="query1" placeholder="search deals" aria-label="Search">
                  </div>
                </div>
                <div class="col-md-3" >


                  <div class="form-group">                   
              <button class="btn btn-outline-light my-2 my-sm-0"  type="submit">View Details</button>
   
             </form>
                        </div>
                    </div>
              </div> --}}

                    <div class="details" >

                    <div class="row" >

                       
                      
                      
                      <div class="col-md-12"  >
  
  
              <div class="form-group">
               <div class="box-body no-padding">
                <div class="table-responsive">
                  <table class="table table-hover">

                    <tr>
                      <th>Deal No.</th>
                      <th>Portfolio No</th>
                      <th>Client No</th>
                      <th>Plot No</th>
                      <th>Date</th>
                      <th>Type</th>
        
             
        
                    </tr>
                    @foreach($plots as $plot)

                    <tr>

                    <td>{{$plot->id}}</td>
                    
                    <td>{{$plot->id}}</td>
               
                    <td>{{$plot->clientno}}</td>
                    
                    <td>{{$plot->id}}</td>
                    
                    <td>{{$plot->date}}</td>
                     
                    <td>{{$plot->type}}</td>
                  </tr>
                  @endforeach

                 
      
                
                
                  </table>
      
                </div>
              </div>
                          </div>
                      </div>
                   

                       
                      
                      
          
                          </div>
                      </div>
                    </div>
                   </div>
                    

          
             </div>
           </div>
           <!-- /.box-header -->
           

				
					<!-- <div class="lookup lookup-circle lookup-right">
					  <input type="text" name="search">
					</div> -->
       
				  </div>
				</div>
				<!-- /.box-header -->
	  
			  
			  <!-- /.box -->
			</div>

			 
			{{-- <script type="text/javascript">

        function submitForm() {
            var selectedOption = $('#select-action').val();
            var url = "";
            if(selectedOption == '1') {
                url = "{{transactions/renewal/'.$selectedOption)}}";
            } 
            .
            .
            .
    
            $('#myForm').attr('action', url);
            $('form#myForm').submit();
            return false;
        }
    </script> --}}

			

			

			

			


			

			

			

		

			

			

			
		  </div>
		  <!-- /.row -->
     
		</section>

  
		<!-- /.content -->
	  </div>
  </div>

            @endsection