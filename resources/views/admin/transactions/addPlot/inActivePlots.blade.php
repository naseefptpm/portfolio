@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Plots</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Transactions</li>
								<li class="breadcrumb-item active" aria-current="page">Inactive Plot List</li>
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
				  <h4 class="box-title">Inactive Plot List</h4>
				  <div class="box-controls pull-right">

					<!-- <div class="lookup lookup-circle lookup-right">
					  <input type="text" name="search">
					</div> -->
				  </div>
				</div>
				<!-- /.box-header -->
				

                <div class="col-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Inactive Plots</h4>
				
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr>
                        <th>Plot No.</th>
						  <th>Area Name</th>
						  <th>Block</th>
						  <th>Property Value</th>
                          <th>Finance Amount</th>
                          <th>PAI Rent</th>
                          <th>Licensed Purpose</th>
                          <th>Application No</th>
                          <th>Plot Area Size</th>
						  <th>PAI Leasing Contract Issue</th>
						  <th>PAI Leasing Contract Expiry Date</th>
						  <th>PAI Leasing Contract Attachment</th>
						  <th>Fire Insurance Issue</th>
						  <th>Fire Insurance Expiry Date</th>
						  <th>Fire Insurance Attachment</th>
						  <th>Fire License Issue</th>
						  <th>Fire License Expiry Date</th>
						  <th>Fire License Attachment</th>
						  <th>Power of Attorney - MOJ Issue Date</th>
						  <th>Power of Attorney - MOJ Expiry Date</th>
						  <th>Power of Attorney - MOJ Issued To</th>
						  <th>Power of Attorney - Warba Issue Date</th>
						  <th>Power of Attorney - Warba Expiry Date</th>
						  <th>Power of Attorney - Warba Issued To</th>
						  <th>Email Attachment For New Deal</th>
						  <th>Email Attachment For POA</th>						  
						 
						  <th>Action</th>






						</tr>
						@foreach($inactives as $plot)
						<tr>
                        <td>{{$plot->id}}</td>
						  <td>{{$plot->areaname}}</td>
                          <td>{{$plot->block}}</td>
						  <td>{{$plot->propertyvalue}}</td>
						  <td>{{$plot->financeamount}}</td>
						  <td>{{$plot->	pairent}}</td>
						  <td>{{$plot->licensedpurpose}}</td>
						  <td>{{$plot->applicationno}}</td>
						  <td>{{$plot->plotareasize}}</td>
						  <td>{{$plot->pai_lc_issue}}</td>
						  <td>{{$plot->pai_lc_expiry}}</td>
                          <td><a href="{{$plot->pai_lc_attach}}">View</a></td>
						  <td>{{$plot->fi_issue}}</td>
						  <td>{{$plot->fi_expiry}}</td>
                          <td><a href="{{$plot->fi_attach}}">View</a></td>
						  <td>{{$plot->fl_issue}}</td>
						  <td>{{$plot->fl_expiry}}</td>
                          <td><a href="{{$plot->fl_attach}}">View</a></td>
						  <td>{{$plot->poa_moj_issue}}</td>
						  <td>{{$plot->poa_moj_expiry}}</td>
						  <td>{{$plot->poa_moj_issued_to}}</td>
						  <td>{{$plot->poa_warba_issue}}</td>
						  <td>{{$plot->poa_warba_expiry}}</td>
						  <td>{{$plot->poa_warba_issued_to}}</td>
						  <td><a href="{{$plot->email_attach_newdeal}}">View</a></td>
                          <td><a href="{{$plot->email_attach_poa}}">View</a></td>
						  


				
						  
                          <td> <a href="{{url('active/plot/'.$plot->id)}}"  class="btn btn-success">Active</a> </td>
						</tr>
						@endforeach

					
					
					  </table>
                      {{ $inactives->links()}}

					</div>
				</div>


				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>

			 
			

			

			

			

			


			

			

			

		

			

			

			
		  </div>
		  <!-- /.row -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

            @endsection