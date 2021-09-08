@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Merge Plots</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Transactions</li>
								<li class="breadcrumb-item active" aria-current="page">Merge Plots</li>
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
			  <h4 class="box-title">Merge Plots</h4>
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
				<form action="{{ route('store.merge')}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                @csrf
					<!-- Step 1 -->
					<section>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstName5">Merge With Plot one</label>
						         <input type="text" value="{{$id}}" name="mergeone" class="form-control" id="emailAddress1" readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstName5">Merge With Plot two</label>
						          <input type="text" value="{{$id2}}" name="mergetwo" class="form-control" id="emailAddress1" readonly>
							</div>
						</div>		  
					</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Portfolio Number</label>
                                    <select class="custom-select form-control" id="Location1" name="portfoliono">
                                        @foreach($portfolio as $port)
							           <option value="{{$port->id}}">{{$port->id}}</option>
                                        @endforeach
                                    </select>
																	</div>
                            </div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Client No</label>
                                    <select class="custom-select form-control" id="Location1" name="clientno">
                                        @foreach($clients as $client)
							           <option value="{{$client->id}}">{{$client->id}}</option>
                                        @endforeach
                                    </select>							</div>
                            </div>
							
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Plot Number</label>
									<input type="text" name="plotno" class="form-control" id="firstName5"> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
                                <label for="Location1">Date</label>
                                <input type="date" class="form-control" name="date" id="jobTitle5"> 
                            </div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Area Name :</label>
									<input type="text" name="areaname" class="form-control" id="firstName5"> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Block</label>
									<input type="text" name="block" class="form-control" id="lastName1"> </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Property Value</label>
									<input type="text" name="propertyvalue" class="form-control" id="emailAddress1"> </div>
							</div>
							<div class="col-md-6">
                            <div class="form-group">
									<label for="emailAddress1">PAI Rent</label>
									<input type="text" name="pairent" class="form-control" id="emailAddress1"> </div>
							</div>
						</div>
					
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Licensed Purpose</label>
									<input type="text" name="licensedpurpose" class="form-control" id="firstName5"> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Application Number</label>
									<input type="text" name="applicationno" class="form-control" id="lastName1"> </div>
							</div>
						</div>

                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Plot Area Size</label>
									<input type="text" name="plotareasize" class="form-control" id="firstName5"> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
                                <label for="jobTitle5">Finance Amount</label>
									<input type="text" class="form-control" name="financeamount" id="jobTitle5"> </div>
							</div>
						</div>
						
						<h5>PAI Leasing Contract :</h5>

                        <div class="row">

							
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Issue</label>
									<input type="date" name="pai_lc_issue" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Expiry Date</label>
									<input type="date" name="pai_lc_expiry" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                <label for="jobTitle5">Attachment</label>
								<input type="file" class="form-control" name="pai_lc_attach" id="jobTitle5"> </div>
							</div>
						</div>

						<h5>Fire Insurance :</h5>

                        <div class="row">

							
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Issue</label>
									<input type="date" name="fi_issue" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Expiry Date</label>
									<input type="date" name="fi_expiry" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                <label for="jobTitle5">Attachment</label>
								<input type="file" class="form-control" name="fi_attach" id="jobTitle5"> </div>
							</div>
						</div>

						<h5>Fire License :</h5>

                        <div class="row">

							
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Issue</label>
									<input type="date" name="fl_issue" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Expiry Date</label>
									<input type="date" name="fl_expiry" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                <label for="jobTitle5">Attachment</label>
								<input type="file" class="form-control" name="fl_attach" id="jobTitle5"> </div>
							</div>
						</div>

						<h5>Power of Attorney - MOJ :</h5>

                        <div class="row">

							
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Issue</label>
									<input type="date" name="poa_moj_issue" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Expiry Date</label>
									<input type="date" name="poa_moj_expiry" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                <label for="jobTitle5">Issued To</label>
								<input type="text" class="form-control" name="poa_moj_issued_to" id="jobTitle5"> </div>
							</div>
						</div>

						<h5>Power 0f Attorney - Warba :</h5>

                        <div class="row">

							
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Issue</label>
									<input type="date" name="poa_warba_issue" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastName1">Expiry Date</label>
									<input type="date" name="poa_warba_expiry" class="form-control" id="lastName1"> </div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
                                <label for="jobTitle5">Issued to</label>
								<input type="text" class="form-control" name="poa_warba_issued_to" id="jobTitle5"> </div>
							</div>
						</div>

						<h5>Email Attachment For :</h5>

                        <div class="row">

							
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">New Deal</label>
									<input type="file" name="email_attach_newdeal" class="form-control" id="lastName1"> </div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
                                <label for="jobTitle5">POA</label>
								<input type="file" class="form-control" name="email_attach_poa" id="jobTitle5"> </div>
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