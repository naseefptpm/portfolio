<?php
use App\Models\Clients;
use App\Models\Plots;

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
    <td><h2>Split Report</h2>
   <p>From Period of {{$from}} - {{$to}}</p>
<p>Portfolio No : {{$id}}</p>
<p>{{$currentDate}}</p>



    </td> 
  </tr>
  
   
</table>
 <br> <br>


<table id="customers">
   
  <tr>
    <th>Sl No</th>
    <th>Deals</th>
    <th>Client No</th>
    <th>Client Name</th>
    <th>Plot No</th>
    <th>Area Name</th>
    <th>Property Value</th>
    <th>Finance Amount</th>
    <th>Date</th>


  </tr>
  {{$i = 1}}

  @foreach($plots as $plot)
  

  {{ $clientname = Clients::select('clientname')->where('id',$plot->clientno)->pluck('clientname'); }}
  {{ $client = str_replace(array('["','"]'),'',$clientname);}}

  {{ $splited = Plots::select('clientno')->where('id',$plot->split)->onlyTrashed()->pluck('clientno');}}
  {{ $splitedclient = str_replace(array('[',']'),'',$splited)}}
 
  {{ $splitclientname = Clients::select('clientname')->where('id',$splited)->pluck('clientname'); }}
  {{ $splitclientname = str_replace(array('["','"]'),'',$clientname)}}

  {{ $plotnos = Plots::select('plotno')->where('id',$plot->split)->onlyTrashed()->pluck('plotno');}}
  {{ $plotno = str_replace(array('[',']'),'',$plotnos)}}

  {{ $area = Plots::select('areaname')->where('id',$plot->split)->onlyTrashed()->pluck('areaname');}}
  {{ $areaname = str_replace(array('["','"]'),'',$area)}}

  {{ $propertyval = Plots::select('propertyvalue')->where('id',$plot->split)->onlyTrashed()->pluck('propertyvalue');}}
  {{ $propertyvalue = str_replace(array('[',']'),'',$propertyval)}}

  {{ $financeamt = Plots::select('financeamount')->where('id',$plot->split)->onlyTrashed()->pluck('financeamount');}}
  {{ $financeamount = str_replace(array('[',']'),'',$financeamt)}}

  {{ $date = Plots::select('date')->where('id',$plot->split)->onlyTrashed()->pluck('date');}}
  {{ $datesp = str_replace(array('["','"]'),'',$date)}}

  

  <tr>
    <td>{{$i++}}</td>
    <td>Splited </td>
    <td>{{$plot->clientno}}</td>
    <td>{{$client}}</td>
    <td>{{$plot->plotno}}</td>
    <td>{{$plot->areaname}}</td>
    <td>{{$plot->propertyvalue}}</td>
    <td>{{$plot->financeamount}}</td>
    <td>{{$plot->date}}</td>

  </tr>

  <tr>
    <td></td>
    <td>from</td>
      <td>{{$splitedclient}}</td>
      <td>{{$splitclientname}}</td>
      <td>{{$plotno}}</td>
      <td>{{$areaname}}</td>
      <td>{{$propertyvalue}}</td>
      <td>{{$financeamount}}</td>
      <td>{{$datesp}}</td>




  </tr>
  
  
  <tr class="table-primary">
    <td colspan="9" ></td>
  </tr>
  @endforeach

</table>
<br> <br>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

 
 

</body>
</html>
