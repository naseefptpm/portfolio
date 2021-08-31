@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create Document Type</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Portfolio</li>
								<li class="breadcrumb-item active" aria-current="page">Create Portfolio</li>
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
			  <h4 class="box-title">Create New Document Type</h4>
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
				<form action="{{ route('store.document')}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                @csrf
					<!-- Step 1 -->
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Document Name</label>
									<input type="text" name="documentname" class="form-control" id="firstName5" required=""> </div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
                                <label for="Location1">Document Related To Options</label>
									<select class="custom-select form-control" id="Location1" name="docoption">
										<option value="">Select</option>
										<option value="Client">Client</option>
										<option value="Building">Building</option>
                                        <option value="Contract">Contract</option>

									</select> </div>
						</div>
						<div class="row">
							<div class="col-md-8">
                            <div class="form-group">
                                <label for="Location1">Document Related To Departments</label>
									<select class="custom-select form-control" id="Location1" name="docdepartment">
										<option value="">Select</option>
										<option value="Fire Department">Fire Department</option>
										<option value="Finance Co">Finance Co</option>
                                        <option value="Insurance">Insurance</option>
                                        <option value="PAI">PAI</option>
                                        <option value="General">General</option>



									</select> </div>
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