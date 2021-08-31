@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Management Fees</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Management Fees</li>
								<li class="breadcrumb-item active" aria-current="page">Fees Calculation</li>
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
        
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <tr class="bg-primary">
                            
                            <th>Plot No</th>
                            <th>Deal Start Date</th>
                            <th>Finance Amount</th>
  
       
  
                          </tr>
                          @foreach($plots as $plot)
                          <tr class="table-primary" style="color: black;">
                            <td>{{$plot->id}}</td>
                            
                            <td>{{$plot->date}}</td>
                            <td>{{$plot->financeamount}}</td>
  
                            
  
                          </tr>
                          @endforeach

                          <tr class="table-info" style="color: red;" >
                            <th>Total</th> 
                            <td></td> 
                            <td>{{$sum}}</td>  
 
 
                          </tr>
                          <tr class="table-secondary" style="color: black;">
                            <th>Management Fees %</th> 
                            <td></td> 
                            @foreach ($mgfee as $fee)
                                
                            <td>{{$fee->mgfeepercentage}}</td>  
                            @endforeach

 
                          </tr>
                          <tr class="bg-success" style="color: blue;">
                            <th>Management Fees</th> 
                            <td></td> 
                                
                            <td>{{$total}} /-</td>  

 
                          </tr>
  
                      
                      
                        </table>
  
                      </div>
             

                 
             <!-- <div class="lookup lookup-circle lookup-right">
               <input type="text" name="search">
             </div> -->
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