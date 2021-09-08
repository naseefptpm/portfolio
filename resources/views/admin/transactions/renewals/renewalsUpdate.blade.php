@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Renewal</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Transactions</li>
								<li class="breadcrumb-item active" aria-current="page">Renewal</li>
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

                    

				  

				 
					<!-- <div class="lookup lookup-circle lookup-right">
					  <input type="text" name="search">
					</div> -->
				  </div>
				</div>
				<!-- /.box-header -->

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
           
            
            @foreach ($plots as $plot)

                <form action="{{ url('store/renewal/'.$plot->id)}}" method="POST" enctype="multipart/form-data" class="tab-wizard wizard-circle">
                    @csrf
                        <!-- Step 1 -->
                        <section>
                             
                        
    
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="firstName5">Portfolio Number</label>
                                        <select class="custom-select form-control" id="Location1" name="reportfoliono">
                                            <option value="{{$plot->portfoliono}}" selected> {{$plot->portfoliono}}</option>
                                            @foreach($portfolio as $port)
                                           <option value="{{$port->id}}">{{$port->id}}</option>
                                            @endforeach
                                        </select>
                                                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lastName1">Client No</label>
                                        <select class="custom-select form-control" id="Location1" name="reclientno">
                                            <option value="{{$plot->clientno}}" selected>{{$plot->clientno }} </option>

                                            @foreach($clients as $client)
                                           <option value="{{$client->id}}">{{$client->id}}</option>
                                            @endforeach
                                        </select>							</div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lastName1">Plot No</label>
                                        <select class="custom-select form-control" id="Location1" name="replotno">
                                          <option value="{{$plot->id}}">{{$plot->id}}</option>
                                        </select>							</div>
                                </div>
                             
                            </div>
    
                            <h5>PAI Leasing Contract :</h5>
    
                            <div class="row">
    
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Issue</label>
                                        <input type="date" value="{{$plot->pai_lc_issue}}" name="repai_lc_issue" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Expiry Date</label>
                                        <input type="date" value="{{$plot->pai_lc_expiry}}" name="repai_lc_expiry" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="jobTitle5">Attachment</label>                                    

                                    <a href="{{url('/'.$plot->pai_lc_attach)}}" class="btn btn-info">View</a>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="jobTitle5">New Attachment</label>                                    
                                    <input type="file" value="{{$plot->pai_lc_attach}}" class="form-control" name="repai_lc_attach" id="jobTitle5"> </div>
                                </div>
                            </div>
    
                            <h5>Fire Insurance :</h5>
    
                            <div class="row">
    
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Issue</label>
                                        <input type="date" value="{{$plot->fi_issue}}" name="refi_issue" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Expiry Date</label>
                                        <input type="date" value="{{$plot->fi_expiry}}" name="refi_expiry" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="jobTitle5">Attachment</label>                                    

                                    <a href="{{url('/'.$plot->fi_attach)}}" class="btn btn-info">View</a>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="jobTitle5">New Attachment</label>
                                    <input type="file" value="{{$plot->fi_attach}}" class="form-control" name="refi_attach" id="jobTitle5"> </div>
                                </div>
                            </div>
    
                            <h5>Fire License :</h5>
    
                            <div class="row">
    
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Issue</label>
                                        <input type="date" value="{{$plot->fl_issue}}" name="refl_issue" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Expiry Date</label>
                                        <input type="date" value="{{$plot->fl_expiry}}" name="refl_expiry" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="jobTitle5">Attachment</label>                                    

                                    <a href="{{url('/'.$plot->fl_attach)}}" class="btn btn-info">View</a>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="jobTitle5">New Attachment</label>
                                    <input type="file" value="{{$plot->fl_attach}}" class="form-control" name="refl_attach" id="jobTitle5"> </div>
                                </div>
                            </div>
    
                            <h5>Power of Attorney - MOJ :</h5>
    
                            <div class="row">
    
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Issue</label>
                                        <input type="date" value="{{$plot->poa_moj_issue}}" name="repoa_moj_issue" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Expiry Date</label>
                                        <input type="date" value="{{$plot->poa_moj_expiry}}" name="repoa_moj_expiry" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="jobTitle5">Issued To</label>
                                    <input type="text" value="{{$plot->poa_moj_issued_to}}" class="form-control" name="repoa_moj_issued_to" id="jobTitle5"> </div>
                                </div>
                            </div>
    
                            <h5>Power 0f Attorney - Warba :</h5>
    
                            <div class="row">
    
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Issue</label>
                                        <input type="date" value="{{$plot->poa_warba_issue}}" name="repoa_warba_issue" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastName1">Expiry Date</label>
                                        <input type="date" value="{{$plot->poa_warba_expiry}}" name="repoa_warba_expiry" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="jobTitle5">Issued to</label>
                                    <input type="text" value="{{$plot->poa_warba_issued_to}}" class="form-control" name="repoa_warba_issued_to" id="jobTitle5"> </div>
                                </div>
                            </div>
    
                            <h5>Email Attachment For :</h5>
    
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="jobTitle5">Attachment</label>                                    

                                    <a href="{{url('/'.$plot->email_attach_newdeal)}}" class="btn btn-info">View</a>

                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="lastName1">New Deal</label>
                                        <input type="file" value="{{$plot->email_attach_newdeal}}" name="reemail_attach_newdeal" class="form-control" id="lastName1"> </div>
                                </div>
                                <div class="col-md-1">
                                    <label for="jobTitle5">Attachment</label>                                    

                                    <a href="{{url('/'.$plot->email_attach_poa)}}" class="btn btn-info">View</a>

                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                    <label for="jobTitle5">POA</label>
                                    <input type="file" value="{{$plot->email_attach_poa}}" class="form-control" name="reemail_attach_poa" id="jobTitle5"> </div>
                                </div>
                            </div>
    
                          
                            
    
                        </section>
                        <!-- Step 2 -->
                        @endforeach

                        <!-- Step 3 -->
                        
                        <!-- Step 4 -->
                        <button type="submit" style="float:right; width: 150px; margin-top: 30px;" class="btn btn-primary">SAVE</button>
    
                    </form>


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