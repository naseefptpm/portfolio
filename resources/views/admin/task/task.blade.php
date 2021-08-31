@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Tasks</h3>
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
				

			<a href="{{ route('task.create') }}">	<button type="button" style="float:right;" class="btn btn-primary mb-5">Create Task</button> </a>

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
				<form method="get" action="{{ route('task.view') }}" id="myForm">

                    <div class="row">

                        <div class="col-md-3" >

							<div class="form-group">
                                <label for="lastName1">Select Client</label>

                                  @csrf
                               <select class="custom-select form-control" id="myForm" name="id">
								<option   value=""  > --Select-- </a></option>

                                @foreach($clients as $task) 
                                    <option   value="{{$task->id}}"  > {{$task->id}} </a></option>
                                    @endforeach

                                </select>
	
                          </div>

                          
                        </div>
						<div style="padding-bottom:25px;">
                     
						<button type="submit" style=" width: 150px; margin-top: 30px; " class="btn btn-primary">View Task</button>

					</div>
                      
                       
                    </div>
               

                  </form>	
			  <!-- /.box -->
			</div>
		  </div>

			<div class="col-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Task List</h4>
				  <div class="box-controls pull-right">

				
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
						  <th>Task No.</th>
						  <th>Task Description</th>
						  <th>Portfolio No</th>
						  <th>Client No</th>
						  <th>Plot No</th>
						  <th>Document Type</th>
						  <th>Due Date</th>
						 
						  <th>Action</th>






						</tr>
						@foreach($tasks as $task)
						<tr>
						  <td>{{$task->id}}</td>
						  

						  <td>{{$task->taskdesc}}</td>

						  <td>{{$task->portfolio}}</td>
						  <td>{{$task->client}}</td>
                          <td>{{$task->plot}}</td>
                          <td>{{$task->doctype}}</td>


				
						  <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$task->duedate}}</span> </td>
						  
						  <td> <a href="{{url('task/edit/'.$task->id)}}" class="btn btn-info">Edit</a>  </td>
                          <td> <a href="{{url('close/task/'.$task->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Close</a> </td>
						</tr>
						@endforeach

						
					
					
					  </table>

					</div>
				</div>

				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>

			 
			

			
			<div class="col-12">
				<div class="box">
				  <div class="box-header with-border">
					<h4 class="box-title">Task Getting Due Today</h4>
					<div class="box-controls pull-right">
  
				
					 
					</div>
				  </div>
				  <!-- /.box-header -->
				  <div class="box-body no-padding">
					  <div class="table-responsive">
						<table class="table table-hover">
						  <tr>
							<th>Task No.</th>
							<th>Task Description</th>
							<th>Portfolio No</th>
							<th>Client No</th>
							<th>Plot No</th>
							<th>Document Type</th>
							<th>Due Date</th>
						   
							
  
						  </tr>
						  @foreach($duetoday as $task)
						  <tr>
							<td>{{$task->id}}</td>
							
  
							<td>{{$task->taskdesc}}</td>
  
							<td>{{$task->portfolio}}</td>
							<td>{{$task->client}}</td>
							<td>{{$task->plot}}</td>
							<td>{{$task->doctype}}</td>
  
  
				  
							<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$task->duedate}}</span> </td>
							
			
						  </tr>
						  @endforeach
  
					  
					  
						</table>
  
					  </div>
				  </div>
  
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->
			  </div>
			

			  <div class="col-12">
				<div class="box">
				  <div class="box-header with-border">
					<h4 class="box-title">Task Getting Due Tomorrow</h4>
					<div class="box-controls pull-right">
					</div>
				  </div>
				  <!-- /.box-header -->
				  <div class="box-body no-padding">
					  <div class="table-responsive">
						<table class="table table-hover">
						  <tr>
							<th>Task No.</th>
							<th>Task Description</th>
							<th>Portfolio No</th>
							<th>Client No</th>
							<th>Plot No</th>
							<th>Document Type</th>
							<th>Due Date</th>
						
						  </tr>
						  @foreach($duetomorrow as $task)
						  <tr>
							<td>{{$task->id}}</td>
		
							<td>{{$task->taskdesc}}</td>
  
							<td>{{$task->portfolio}}</td>
							<td>{{$task->client}}</td>
							<td>{{$task->plot}}</td>
							<td>{{$task->doctype}}</td>
  
							<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$task->duedate}}</span> </td>
				
						  </tr>
						  @endforeach
  
						</table>
  
					  </div>
				  </div>
  
				  <!-- /.box-body -->
				</div>
				<!-- /.box -->
			  </div>
			

			
			

			  <div class="col-12">
				<div class="box">
				  <div class="box-header with-border">
					<h4 class="box-title">Task Getting Over Due</h4>
					<div class="box-controls pull-right">
					</div>
				  </div>
				  <!-- /.box-header -->
				  <div class="box-body no-padding">
					  <div class="table-responsive">
						<table class="table table-hover">
						  <tr>
							<th>Task No.</th>
							<th>Task Description</th>
							<th>Portfolio No</th>
							<th>Client No</th>
							<th>Plot No</th>
							<th>Document Type</th>
							<th>Due Date</th>
						
						  </tr>
						  @foreach($overdue as $task)
						  <tr>
							<td>{{$task->id}}</td>
		
							<td>{{$task->taskdesc}}</td>
  
							<td>{{$task->portfolio}}</td>
							<td>{{$task->client}}</td>
							<td>{{$task->plot}}</td>
							<td>{{$task->doctype}}</td>
  
							<td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$task->duedate}}</span> </td>
				
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