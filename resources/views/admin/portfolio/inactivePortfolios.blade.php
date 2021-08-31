@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Inactive Portfolios</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Portfolios</li>
								<li class="breadcrumb-item active" aria-current="page">Inactive Portfolios</li>
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
				  <h4 class="box-title">Portfolio List</h4>
				  <div class="box-controls pull-right">
					<div class="lookup lookup-circle lookup-right">
					  <input type="text" name="s">
					</div>
				  </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr>
						  <th>Portfolio No.</th>
						  <th>Portfolio Name</th>
						  <th>Management Fee %</th>
						  <th>Min Feees per Quarter</th>
						  <th>Fees Calculation Method</th>
						  <th>Contact Person</th>
						  <th>Contact Number</th>
						  <th>Contact Email</th>
						  <th>Agreement Date</th>
						  <th>Agreement Expiry</th>
						  <th>Agreement Attachment</th>
						  <th>Action</th>

						 






						</tr>
						@foreach($inactives as $portfolio)
						<tr>
						  <td>{{$portfolio->id}}</td>
						  <td>{{$portfolio->portfolioname}}</td>
						  <td>{{$portfolio->mgfeepercentage}}</td>
						  <td>{{$portfolio->minfeeperquarter}}</td>
						  <td>{{$portfolio->feecalmethod}}</td>

						  <td>{{$portfolio->contactperson}}</td>

						  <td>{{$portfolio->contactnumber}}</td>
						  <td>{{$portfolio->contactemail}}</td>
				
						  <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$portfolio->agreementdate}}</span> </td>
						  <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$portfolio->agreementexpdate}}</span> </td>
						  <td><a href="{{url('/'.$portfolio->agreementattach)}}">View</a></td>
						  <td> <a href="{{url('active/portfolio/'.$portfolio->id)}}"  class="btn btn-success">Active</a> </td>

						  
						</tr>
						@endforeach

					
					
					  </table>

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