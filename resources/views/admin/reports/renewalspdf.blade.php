<?php
use App\Models\Clients;
?>
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table id="customers">
  <tr>
    <td><h2>
  {{-- <?php $image_path = '/upload/easyschool.png'; ?>
  <img src="{{ public_path() . $image_path }}" width="200" height="100"> --}}

    </h2></td>
    <td><h2>Renewals Report</h2>
      <p>From Period of {{$from}} - {{$to}}</p>
      <p>Portfolio No : {{$id}}</p>
      <p>{{$currentDate}}</p>



    </td> 
  </tr>
  
   
</table>
 <br> <br>


<table id="customers">
   
    <tr>
        <th>Expired</th> 
       <th>Client No</th>
       <th>Client Name</th>

       <th>Plot No</th>
       <th>Expired At</th>



     </tr>

     @foreach($pailc as $plot)
     {{  $clientname = Clients::select('clientname')->where('id',$plot->clientno)->pluck('clientname'); }}
     {{ $client = str_replace(array('["','"]'),'',$clientname)}}
     <tr>
       <th>PAI Leasing Contract Expired</th>
       <td>{{$plot->clientno}}</td>
       <td>{{$client}}</td>
       <td>{{$plot->plotno}}</td>
       <td>{{$plot->pai_lc_expiry}}</td>


       
     </tr>
     @endforeach

     @foreach($fiex as $plot)
     {{  $clientname = Clients::select('clientname')->where('id',$plot->clientno)->pluck('clientname'); }}
     {{ $client = str_replace(array('["','"]'),'',$clientname)}}
     <tr>
       <th>fire Insurance Expired</th>

       <td>{{$plot->clientno}}</td>
       <td>{{$client}}</td>
       <td>{{$plot->plotno}}</td>
       <td>{{$plot->fi_expiry}}</td>


       
     </tr>
     @endforeach

     @foreach($flex as $plot)
     {{  $clientname = Clients::select('clientname')->where('id',$plot->clientno)->pluck('clientname'); }}
     {{ $client = str_replace(array('["','"]'),'',$clientname)}}
     <tr>
       <th>fire License Expired</th>
       <td>{{$plot->clientno}}</td>
       <td>{{$client}}</td>
       <td>{{$plot->plotno}}</td>
       <td>{{$plot->fl_expiry}}</td>


       
     </tr>
     @endforeach

    

     @foreach($pmoj as $plot)
     {{  $clientname = Clients::select('clientname')->where('id',$plot->clientno)->pluck('clientname'); }}
     {{ $client = str_replace(array('["','"]'),'',$clientname)}}
     <tr>
       <th>Power of Attorney MOJ Expired</th>

       <td>{{$plot->clientno}}</td>
       <td>{{$client}}</td>
       <td>{{$plot->plotno}}</td>
       <td>{{$plot->poa_warba_expiry}}</td>


       
     </tr>
     @endforeach

     @foreach($pwab as $plot)
     {{  $clientname = Clients::select('clientname')->where('id',$plot->clientno)->pluck('clientname'); }}
     {{ $client = str_replace(array('["','"]'),'',$clientname)}}
     <tr>
       <th>Power of Attorney Warba Expired</th>

       <td>{{$plot->clientno}}</td>
       <td>{{$client}}</td>
       <td>{{$plot->plotno}}</td>
       <td>{{$plot->poa_moj_expiry}}</td>


       
     </tr>
     @endforeach
   
  {{-- <tr>
    <td colspan="2">
      <strong>Total Absent : </strong>  <strong> Total Leave : </strong> 

    </td>
  </tr>   --}}
   
</table>
<br> <br>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

 
 

</body>
</html>
