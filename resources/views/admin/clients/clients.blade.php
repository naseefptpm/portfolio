@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Clients</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Tables</li>
								<li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
							</ol>
						</nav>

					</div>

				</div>
			<a href="{{ route('client.create') }}">	<button type="button" style="float:right;" class="btn btn-primary mb-5">Create Client</button> </a>

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
				  <h4 class="box-title">Clients List</h4>
				  <div class="box-controls pull-right">

				  <form action="{{ url('/search')}}" class="form-inline my-2 my-lg-0" type="get">
 <input type="search" class="form-control rounded" name="query" placeholder="search clients" aria-label="Search">
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
						  <th>Client No.</th>
						  <th>Client Name</th>
						  <th>Address</th>
						  <th>Telephone</th>
						  <th>Email</th>
						  <th>ID Type</th>
						  <th>ID Number</th>
						  <th>ID Expiry Date</th>
						 
						  <th>Action</th>






						</tr>
						@foreach($clients as $client)
						<tr>
						  <td>{{$client->id}}</td>
						  <td>{{$client->clientname}}</td>
						  

						  <td>{{$client->clientaddress}}</td>

						  <td>{{$client->clienttelephone}}</td>
						  <td>{{$client->clientemail}}</td>
                          <td>{{$client->clientidtype}}</td>
                          <td>{{$client->clientidno}}</td>


				
						  <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$client->clientidexpdate}}</span> </td>
						  
						  <td> <a href="{{url('client/edit/'.$client->id)}}" class="btn btn-info">Update</a>  </td>
                          <td> <a href="{{url('delete/client/'.$client->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a> </td>
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