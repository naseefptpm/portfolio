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
								<li class="breadcrumb-item active" aria-current="page">New Deal</li>
							</ol>
						</nav>

					</div>

				</div>
                <a href="{{ route('deal.inactives') }}">	<button type="button" style="float:right; margin-right:10px;" class="btn btn-warning mb-5">Inactive Deals</button> </a>

			<a href="{{ route('plot.create') }}">	<button type="button" style="float:right;" class="btn btn-primary mb-5">Add Deal</button> </a>

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
				  <h4 class="box-title">Deal List</h4>
				  <div class="box-controls pull-right">

				  <form action="" class="form-inline my-2 my-lg-0" type="get">
                 <input type="search" class="form-control rounded" name="query" placeholder="search deals" aria-label="Search">
				   <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>

				  </form>
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
						  <th>Type</th>

     
						  <th>Action</th>

						</tr>
						@foreach($plots as $plot)
						<tr>
						  <td>{{$plot->id}}</td>
						  <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
						  <td>{{$plot->id}}</td>
						  <td>{{$plot->date}}</td>
						  <td>{{$plot->type}}</td>

						  

						  <td> <a href="{{url('plot/edit/'.$plot->id)}}" class="btn btn-info">Edit</a>  </td>
                          <td> <a href="{{url('inactive/plot/'.$plot->id)}}" onclick="return confirm('Are you sure to inactive')" class="btn btn-danger">Inactive</a> </td>
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