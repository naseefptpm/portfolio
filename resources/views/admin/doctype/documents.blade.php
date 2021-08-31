@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Document Types</h3>
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
			<a href="{{ route('document.create') }}">	<button type="button" style="float:right;" class="btn btn-primary mb-5">Create Document Type</button> </a>

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
				  <h4 class="box-title">Document Types</h4>
				  <div class="box-controls pull-right">

				  <!-- <form action="" class="form-inline my-2 my-lg-0" type="get">
 <input type="search" class="form-control rounded" name="query" placeholder="search clients" aria-label="Search">
				   <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->

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
						  <th>Document No.</th>
						  <th>Document Name</th>
						  <th>Document Related to Options</th>
						  <th>Document Related to Departments</th>
						  
						 
						  <th>Action</th>






						</tr>
						@foreach($documents as $document)
						<tr>
						  <td>{{$document->id}}</td>
						  <td>{{$document->documentname}}</td>
						  

						  <td>{{$document->docoption}}</td>

						  <td>{{$document->docdepartment}}</td>
						  


				
						  
						  <td> <a href="{{url('document/edit/'.$document->id)}}" class="btn btn-info">Update</a>  </td>
                          <td> <a href="{{url('inactive/document/'.$document->id)}}" onclick="return confirm('Are you sure to inactive')" class="btn btn-danger">Inactive</a> </td>
						</tr>
						@endforeach

					
					
					  </table>

					</div>
				</div>


                <div class="col-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Inactive Document Types</h4>
				
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<div class="table-responsive">
					  <table class="table table-hover">
						<tr>
						  <th>Document No.</th>
						  <th>Document Name</th>
						  <th>Document Related to Options</th>
						  <th>Document Related to Departments</th>
						  
						 
						  <th>Action</th>






						</tr>
						@foreach($inactives as $document)
						<tr>
						  <td>{{$document->id}}</td>
						  <td>{{$document->documentname}}</td>
						  

						  <td>{{$document->docoption}}</td>

						  <td>{{$document->docdepartment}}</td>
						  


				
						  
                          <td> <a href="{{url('active/document/'.$document->id)}}"  class="btn btn-success">Active</a> </td>
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