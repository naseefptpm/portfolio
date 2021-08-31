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
								<li class="breadcrumb-item active" aria-current="page">Inactive Deals</li>
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
				  <h4 class="box-title">Inactive Deal List</h4>
				  <div class="box-controls pull-right">

			
					<!-- <div class="lookup lookup-circle lookup-right">
					  <input type="text" name="search">
					</div> -->
				  </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr>
						  <th>Deal No.</th>
						  <th>Portfolio No</th>
						  <th>Client No</th>
                          <th>Plot No</th>
                          <th>Date</th>
     
						  <th>Action</th>

						</tr>
						@foreach($inactives as $plot)
						<tr>
						  <td>{{$plot->id}}</td>
						  <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
						  <td>{{$plot->id}}</td>
						  <td>{{$plot->date}}</td>
						  

                          <td> <a href="{{url('active/plot/'.$plot->id)}}"  class="btn btn-success">active</a> </td>
						</tr>
						@endforeach

					
					
					  </table>

					</div>
				</div>


                <div class="col-12">
			  
			  <!-- /.box -->
			</div>

			 
			

			

			

			

			


			

			

			

		

			

			

			
		  </div>
		  <!-- /.row -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

            @endsection