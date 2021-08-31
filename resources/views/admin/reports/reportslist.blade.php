@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Reports</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Reports</li>
								<li class="breadcrumb-item active" aria-current="page">Reports</li>
							</ol>
						</nav>

					</div>

				</div>


			</div>
		</div>


        <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Dividing and Merging Reports</h4>
       
        <div class="box-body no-padding">

            <div class="table-responsive">

              <table class="table table-hover">
                <tr>
                  <th>Deal No.</th>
                  <th>Portfolio No</th>
                  <th>Client No</th>
                  <th>Plot No</th>
                  <th>Date</th>
                  <th>Type</th>



                </tr>
                @foreach($plots as $plot)
                <tr>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->portfoliono}}</td>
                  <td>{{$plot->clientno}}</td>
                  <td>{{$plot->id}}</td>
                  <td>{{$plot->date}}</td>
                  <td>{{$plot->type}}</td>

                  
                </tr>
                @endforeach

            
            
              </table>

            </div>
        </div> 

             </div>
           </div>
    
				  </div>




                  <div class="col-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h4 class="box-title">Renewals Due Date Reports</h4>
               
                <div class="box-body no-padding">
        
                    <div class="table-responsive">
        
                      <table class="table table-hover">
                        <tr>
                           <th>Expired</th> 
                          <th>Deal No.</th>
                          <th>Portfolio No</th>
                          <th>Client No</th>
                          <th>Plot No</th>
                          <th>Date</th>
                          <th>Expired At</th>
        
        
        
                        </tr>

                        @foreach($pailc as $plot)
                        <tr>
                          <th>PAI Leasing Contract Expired</th>

                          <td>{{$plot->id}}</td>
                          <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
                          <td>{{$plot->id}}</td>
                          <td>{{$plot->date}}</td>
                          <td>{{$plot->pai_lc_expiry}}</td>

        
                          
                        </tr>
                        @endforeach

                        @foreach($fiex as $plot)
                        <tr>
                          <th>fire Insurance Expired</th>

                          <td>{{$plot->id}}</td>
                          <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
                          <td>{{$plot->id}}</td>
                          <td>{{$plot->date}}</td>
                          <td>{{$plot->fi_expiry}}</td>

        
                          
                        </tr>
                        @endforeach

                        @foreach($flex as $plot)
                        <tr>
                          <th>fire License Expired</th>

                          <td>{{$plot->id}}</td>
                          <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
                          <td>{{$plot->id}}</td>
                          <td>{{$plot->date}}</td>
                          <td>{{$plot->fl_expiry}}</td>

        
                          
                        </tr>
                        @endforeach

                       

                        @foreach($pmoj as $plot)
                        <tr>
                          <th>Power of Attorney MOJ Expired</th>

                          <td>{{$plot->id}}</td>
                          <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
                          <td>{{$plot->id}}</td>
                          <td>{{$plot->date}}</td>
                          <td>{{$plot->poa_warba_expiry}}</td>

        
                          
                        </tr>
                        @endforeach

                        @foreach($pwab as $plot)
                        <tr>
                          <th>Power of Attorney Warba Expired</th>

                          <td>{{$plot->id}}</td>
                          <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
                          <td>{{$plot->id}}</td>
                          <td>{{$plot->date}}</td>
                          <td>{{$plot->poa_moj_expiry}}</td>

        
                          
                        </tr>
                        @endforeach
        
                    
                    
                      </table>
        
                    </div>
                </div> 
                     
                      
                
        
                         
                 
                     </div>
                   </div>
                   <!-- /.box-header -->
                   
               
                          </div>
                  

                <div class="col-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <h4 class="box-title">Plot Addition Reports </h4>
                       
                        <div class="box-body no-padding">
                
                            <div class="table-responsive">
                
                              <table class="table table-hover">
                                <tr>
                                  <th>Plot No.</th>
                                  <th>Area Name</th>
                                  <th>Property Value</th>
                                  <th>Block</th>
                                  <th>Finance Amount</th>
                                  <th>Date</th>
                
                                </tr>
                                @foreach($plots as $plot)
                                <tr>
                                  <td>{{$plot->id}}</td>
                                  <td>{{$plot->areaname}}</td>
                                  <td>{{$plot->propertyvalue}}</td>
                                  <td>{{$plot->block}}</td>
                                  <td>{{$plot->financeamount}}</td>
                                  <td>{{$plot->date}}</td>
                
                                  
                                </tr>
                                @endforeach
                
                              </table>
                
                            </div>
                        </div> 
                        </div>
                      </div>
                      </div>
        


                                  <div class="col-12">
                                    <div class="box">
                                      <div class="box-header with-border">
                                        <h4 class="box-title">Plot Closure Reports </h4>
                               
                                <div class="box-body no-padding">
                        
                                    <div class="table-responsive">
                        
                                      <table class="table table-hover">
                                        <tr>
                                          <th>Plot No.</th>
                                          <th>Area Name</th>
                                          <th>Property Value</th>
                                          <th>Block</th>
                                          <th>Finance Amount</th>
                                          <th>Date</th>
                        
                                        </tr>
                                        @foreach($inactives as $plot)
                                        <tr>
                                          <td>{{$plot->id}}</td>
                                          <td>{{$plot->areaname}}</td>
                                          <td>{{$plot->propertyvalue}}</td>
                                          <td>{{$plot->block}}</td>
                                          <td>{{$plot->financeamount}}</td>
                                          <td>{{$plot->date}}</td>
                        
                                          
                                        </tr>
                                        @endforeach
                        
                                    
                                    
                                      </table>
                        
                                    </div>
                                </div> 
                                     
                      
                                     </div>
                                   </div>
                                   <!-- /.box-header -->
                                   
                               
                                          </div>

      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Delegation List Reports</h4>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tr>
                          <th>Deal No.</th>
                          <th>Portfolio No</th>
                          <th>Client No</th>
                          <th>Plot No</th>
                          <th>Date</th>
                          <th>Power of Attorney Warba</th>
                          <th>Power of Attorney MOJ</th>
                        </tr>

                        @foreach($plots as $plot)
                        <tr>

                          <td>{{$plot->id}}</td>
                          <td>{{$plot->portfoliono}}</td>
                          <td>{{$plot->clientno}}</td>
                          <td>{{$plot->id}}</td>
                          <td>{{$plot->date}}</td>
                          <td>{{$plot->poa_moj_expiry}}</td>

                          <td>{{$plot->poa_warba_expiry}}</td>

                        </tr>
                        @endforeach

                      </table>
                    </div>
                </div> 
              </div>
            </div>
          </div>



          
      <div class="col-12">
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Management Fees Reports</h4>
                <div class="box-body no-padding">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tr>
                          <th>Sl No.</th>
                          <th>Portfolio No</th>
                          <th>Fee Calculation Method</th>
                          <th>Calculation Period</th>
                          <th>Management Fees</th>
                        
                        </tr>

                        @foreach($mgfee as $fee)
                        <tr>

                          <td>{{$fee->id}}</td>
                          <td>{{$fee->portfoliono}}</td>
                          <td>{{$fee->type}}</td>
                          <td>{{$fee->calcprd}}</td>
                          <td>{{$fee->mgfees}}</td>
                        </tr>
                        @endforeach

                      </table>
                    </div>
                </div> 
              </div>
            </div>
          </div>
                                          
                        
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Finance Reports </h4>
                 
                  <div class="box-body no-padding">
          
                      <div class="table-responsive">
          
                        <table class="table table-hover">
                          <tr>
                            <th>Plot No.</th>
                            <th>Area Name</th>
                            <th>Property Value</th>
                            <th>Block</th>
                            <th>Finance Amount</th>
                            <th>Date</th>
          
                          </tr>
                          @foreach($plots as $plot)
                          <tr>
                            <td>{{$plot->id}}</td>
                            <td>{{$plot->areaname}}</td>
                            <td>{{$plot->propertyvalue}}</td>
                            <td>{{$plot->block}}</td>
                            <td>{{$plot->financeamount}}</td>
                            <td>{{$plot->date}}</td>
          
                            
                          </tr>
                          @endforeach
          
                        </table>
          
                      </div>
                  </div> 
                  </div>
                </div>
                </div>


                  <div class="col-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h4 class="box-title">Pending Task Reports </h4>
               
                <div class="box-body no-padding">
        
                    <div class="table-responsive">
        
                      <table class="table table-hover">
                        <tr>
                          <th>Client No.</th>
                          <th>Task Description</th>
                          <th>Portfolio No</th>
                          <th>Plot No</th>
                          <th>Document Type</th>
                          <th>Due Date</th>
        
        
        
                        </tr>
                        @foreach($tasks as $task)
                        <tr>
                          <td>{{$task->client}}</td>
                          <td>{{$task->taskdesc}}</td>
                          <td>{{$task->portfolio}}</td>
                          <td>{{$task->plot}}</td>
                          <td>{{$task->doctype}}</td>
                          <td>{{$task->duedate}}</td>
        
                          
                        </tr>
                        @endforeach
        
                    
                    
                      </table>
        
                    </div>
                </div> 
                     
                      
                
        
                         
                 
                     </div>
                   </div>
                   <!-- /.box-header -->
                   
               
                          </div>





				</div>
				<!-- /.box-header -->
	  
			  
			  <!-- /.box -->
			</div>

			 
		
			

			

			

			


			

			

			

		

			

			

			
		  </div>
		  <!-- /.row -->
     
		</section>

  
		<!-- /.content -->
	  </div>
  </div>

            @endsection