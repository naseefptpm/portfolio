@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create Portfolio</h3>
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
			  <h4 class="box-title">Create New Portfolio</h4>
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
				<form action="{{ route('store.portfolio')}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                @csrf
					<!-- Step 1 -->
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Portfolio Name :</label>
									<input type="text" name="portfolioname" class="form-control" id="firstName5" required=""  > </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Management Fess %</label>
									<input type="text" name="mgfeepercentage" class="form-control" id="lastName1" required=""> </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Minimum Fees Per Quater (every 3 Months)</label>
									<input type="text" name="minfeeperquarter" class="form-control" id="emailAddress1" required=""> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
                                <label for="Location1">Fees Calculation Method</label>
									<select class="custom-select form-control" id="Location1" name="feecalmethod" required="">
										<option value="">Select</option>
										<option value="flat">Flat</option>
										<option value="proportionate">Proportionate</option>
									</select> </div>
							</div>
						</div>
					
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Contact Person</label>
									<input type="text" name="contactperson" class="form-control" id="firstName5" required=""> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Contact Number</label>
									<input type="text" name="contactnumber" class="form-control" id="lastName1" required=""> </div>
							</div>
						</div>

                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Contact Email</label>
									<input type="email" name="contactemail" class="form-control" id="firstName5" required=""> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
                                <label for="jobTitle5">Portfolio Agreement Date</label>
									<input type="date" class="form-control" name="agreementdate" id="jobTitle5" required=""> </div>
							</div>
						</div>

                        <div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
                                <label for="jobTitle5">Agreement Expiry Date</label>
									<input type="date" class="form-control" name="agreementexpdate" id="jobTitle5" required=""> </div>
							</div>

                            <div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Copy of the agreement Attachment</label>
                                    <input type="file" name="agreementattach" class="form-control" required=""> </div>
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