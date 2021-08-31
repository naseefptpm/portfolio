@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Client</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Client</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Client</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	 
 

		<!-- Main content -->
		<section class="content">

		 <!-- Step wizard -->
		  <div class="box box-default">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Client Details</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
            @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
				<form action="{{ url('update/client/'.$clients->id)}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                @csrf
					<!-- Step 1 -->
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Client Name</label>
									<input type="text" value="{{$clients->clientname}}" name="clientname" class="form-control" id="firstName5" required=""> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Address</label>
									<input type="text" value="{{$clients->clientaddress}}" name="clientaddress" class="form-control" id="lastName1" required=""> </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Telephone</label>
									<input type="text" value="{{$clients->clienttelephone}}" name="clienttelephone" class="form-control" id="emailAddress1" required=""> </div>
							</div>

                            <div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Email</label>
									<input type="email" value="{{$clients->clientemail}}" name="clientemail" class="form-control" id="emailAddress1" required=""> </div>
							</div>
						
                            
						</div>
					
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">ID Type</label>
									<input type="text" value="{{$clients->clientidtype}}" name="clientidtype" class="form-control" id="firstName5" required=""> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">ID Number</label>
									<input type="text" value="{{$clients->clientidno}}" name="clientidno" class="form-control" id="lastName1" required=""> </div>
							</div>
						</div>

                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">ID Expiry Date</label>
									<input type="text" value="{{$clients->clientidexpdate}}" name="clientidexpdate" class="form-control" id="firstName5" required=""> </div>
							</div>
							
						</div>

                        
						

					</section>
					<!-- Step 2 -->
					
					<!-- Step 3 -->
					
					<!-- Step 4 -->
                    <button type="submit" style="float:right; width: 150px; margin-top: 30px;" class="btn btn-primary">SAVE</button>

				</form>
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		  <!-- vertical wizard -->
		  
		  <!-- /.box -->

		  <!-- Validation wizard -->
		  
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>

@endsection