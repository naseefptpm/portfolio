@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Create Task</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Task</li>
								<li class="breadcrumb-item active" aria-current="page">New Task</li>
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
			  <h4 class="box-title">Create New Task</h4>
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
				<form action="{{ route('store.task')}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                @csrf
					<!-- Step 1 -->
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Task Description</label>
									<input type="text" name="taskdesc" class="form-control" id="firstName5" required=""> </div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Portfolio Number</label>
                                    <select class="custom-select form-control" id="Location1" name="portfolio">
                                        @foreach($portfolio as $port)
							           <option value="{{$port->id}}">{{$port->id}}</option>
                                        @endforeach
                                    </select>
																	</div>
                            </div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastName1">Client No</label>
                                    <select class="custom-select form-control" id="Location1" name="client">
                                        @foreach($clients as $client)
							           <option value="{{$client->id}}">{{$client->id}}</option>
                                        @endforeach
                                    </select>							</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Plot Number</label>
                                    <select class="custom-select form-control" id="Location1" name="plot">
                                        @foreach($plots as $plot)
							           <option value="{{$plot->plotno}}">{{$plot->plotno}}</option>
                                        @endforeach
                                    </select>							</div>
                            </div>
						
                            
						</div>
					
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Document Type</label>
                                    <select class="custom-select form-control" id="Location1" name="doctype">
							           <option value="">Select</option>
                                       <option value="PAI Leasing Contract">PAI Leasing Contract</option>
                                       <option value="Fire Insurancet">Fire Insurance</option>
                                       <option value="Power of Attorney – MOJ ">Power of Attorney – MOJ </option>
                                       <option value="Power of Attorney –Warba">Power of Attorney –Warba</option>
                                       <option value="Fire License">Fire Licenset</option>
                                       <option value="Email Attachment ">Email Attachment t</option>


                                    </select>							</div>
                            </div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Due Date</label>
									<input type="date" name="duedate" class="form-control" id="firstName5"> </div>
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