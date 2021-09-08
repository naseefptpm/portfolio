@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Portfolio</b> System</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
        <li class="{{ ($route == 'dashboard')?'active':'' }}" >
          <a href="{{ route('dashboard') }}">
            <i data-feather="grid"></i>
			<span>Dashboard</span>
          </a>
        </li>  
	
        <li class="{{ ($route == 'portfolio')?'active':'' }}" >
          <a href="{{ route('portfolio') }}">
            <i data-feather="server"></i>
            <span>Portfolio</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li> 

        <li class="{{ ($route == 'clients')?'active':'' }}" >
          <a href="{{ route('clients') }}">
            <i data-feather="user"></i>
            <span>Clients</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>  

        <li class="{{ ($route == 'document.type')?'active':'' }}" >
          <a href="{{ route('document.type') }}">
            <i data-feather="credit-card"></i>
            <span>Document Type</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li> 

        <li class="treeview ">
          <a href="#">
            <i data-feather="layers"></i>
            <span>Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{ ($route == 'transaction.newdeal')?'active':'' }}" ><a href="{{ route('transaction.newdeal') }}"><i class="ti-more"></i>New Deal</a></li>
              <li class="{{ ($route == 'transaction.addplot')?'active':'' }}" ><a href="{{ route('transaction.addplot') }}"><i class="ti-more"></i>Add Plot</a></li>
              <li class="{{ ($route == 'transaction.renewals')?'active':'' }}" ><a href="{{ route('transaction.renewals') }}"><i class="ti-more"></i>Renewals</a></li>
              <li class="{{ ($route == 'transaction.merge')?'active':'' }}" ><a href="{{ route('transaction.merge') }}"><i class="ti-more"></i>Merge</a></li>
              <li class="{{ ($route == 'transaction.split')?'active':'' }}" ><a href="{{ route('transaction.split') }}"><i class="ti-more"></i>Split</a></li>
              <li class="{{ ($route == 'transaction.transfer')?'active':'' }}" ><a href="{{ route('transaction.transfer') }}"><i class="ti-more"></i>Transfer</a></li>


            
          </ul>
        </li>

		  
        <li class="{{ ($route == 'tasks')?'active':'' }}" >
          <a href="{{ route('tasks') }}">
            <i data-feather="inbox"></i>
            <span>Task</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li> 
		
        <li class="{{ ($route == 'calculateFee')?'active':'' }}" >
          <a href="{{ route('calculateFee') }}">
            <i data-feather="edit-2"></i>
            <span>Calculate Fee</span>
            <span class="pull-right-container">
            </span>
          </a>
         
        </li> 		  
		 
		  
     
		
		
		  
        <li class="treeview" >
          <a href="">
            <i data-feather="pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>

            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'reports.plotadd')?'active':'' }}" ><a href="{{ route('reports.plotadd') }}"><i class="ti-more"></i>Plot Addition</a></li>
            <li class="{{ ($route == 'reports.plotclose')?'active':'' }}" ><a href="{{ route('reports.plotclose') }}"><i class="ti-more"></i>Plot Closure</a></li>
            <li class="{{ ($route == 'reports.divmer')?'active':'' }}" ><a href="{{ route('reports.divmer') }}"><i class="ti-more"></i>Merge Reports</a></li>
            <li class="{{ ($route == 'reports.split')?'active':'' }}" ><a href="{{ route('reports.split') }}"><i class="ti-more"></i>Split Reports</a></li>
            <li class="{{ ($route == 'reports.renewals')?'active':'' }}" ><a href="{{ route('reports.renewals') }}"><i class="ti-more"></i>Renewals Due Date</a></li>
            <li class="{{ ($route == 'reports.delegation')?'active':'' }}" ><a href="{{ route('reports.delegation') }}"><i class="ti-more"></i>Delegation List</a></li>
            <li class="{{ ($route == 'reports.finance')?'active':'' }}" ><a href="{{ route('reports.finance') }}"><i class="ti-more"></i>Finance Report</a></li>
            <li class="{{ ($route == 'reports.mgfee')?'active':'' }}" ><a href="{{ route('reports.mgfee') }}"><i class="ti-more"></i>Management Fee Report</a></li>
            <li class="{{ ($route == 'reports.task')?'active':'' }}" ><a href="{{ route('reports.task') }}"><i class="ti-more"></i>Pending Task</a></li>
            <li class="{{ ($route == 'reports.taskcomplete')?'active':'' }}" ><a href="{{ route('reports.taskcomplete') }}"><i class="ti-more"></i>Completed Task</a></li>





          
        </ul>
         
        </li> 	
		  
        
		  
       
		  
 
			  
		  
    
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>