@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Deal</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">New Deal</li>
								<li class="breadcrumb-item active" aria-current="page">Create New Deal</li>
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
			  <h4 class="box-title">Create New Deal</h4>
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
				<form action="{{ url('update/deal/'.$deals->id)}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                @csrf
					<!-- Step 1 -->
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstName5">Portfolio Number</label>
                                    <select class="custom-select form-control" id="Location1" name="portfoliono">
                                        <option value="{{$deals->portfoliono}}">{{$deals->portfoliono}}</option>

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
                                        <option value="{{$deals->clientno}}">{{$deals->clientno}}</option>

                                        @foreach($clients as $client)
							           <option value="{{$client->id}}">{{$client->id}}</option>
                                        @endforeach
                                    </select>							</div>
                            </div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailAddress1">Plot Number</label>
                                    <select class="custom-select form-control" id="Location1" name="plotno">
                                        <option value="{{$deals->plotno}}">{{$deals->plotno}}</option>

                                        @foreach($plots as $plot)
							           <option value="{{$plot->id}}">{{$plot->id}}</option>
                                        @endforeach
                                    </select>							</div>
                            </div>
							<div class="col-md-6">
								<div class="form-group">
                                <label for="Location1">Date</label>
                                <input type="date" value="{{$deals->date}}" class="form-control" name="date" id="jobTitle5" required=""> 
                            </div>
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