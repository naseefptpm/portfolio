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
    <td><h2>Merging Report</h2>
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
  {{ $client = str_replace(array('["','"]'),'',$clientname)}}

 

  {{ $client1 = Plots::select('clientno')->where('id',$plot->mergone)->onlyTrashed()->pluck('clientno');}}
  {{ $clientone = str_replace(array('[',']'),'',$client1)}}

  {{ $client2 = Plots::select('clientno')->where('id',$plot->mergtwo)->onlyTrashed()->pluck('clientno');}}
  {{ $clienttwo = str_replace(array('[',']'),'',$client2)}}

  {{ $clientname1 = Clients::select('clientname')->where('id',$clientone)->pluck('clientname'); }}
  {{ $clientnameone = str_replace(array('["','"]'),'',$clientname1)}}

  {{ $clientname2 = Clients::select('clientname')->where('id',$clienttwo)->pluck('clientname'); }}
  {{ $clientnametwo = str_replace(array('["','"]'),'',$clientname2)}}

  {{ $plot1 = Plots::select('plotno')->where('id',$plot->mergone)->onlyTrashed()->pluck('plotno');}}
  {{ $plotone = str_replace(array('[',']'),'',$plot1)}}

  {{ $plot2 = Plots::select('plotno')->where('id',$plot->mergtwo)->onlyTrashed()->pluck('plotno');}}
  {{ $plottwo = str_replace(array('[',']'),'',$plot2)}}

  {{ $area1 = Plots::select('areaname')->where('id',$plot->mergone)->onlyTrashed()->pluck('areaname');}}
  {{ $areaone = str_replace(array('["','"]'),'',$area1)}}

  {{ $area2 = Plots::select('areaname')->where('id',$plot->mergtwo)->onlyTrashed()->pluck('areaname');}}
  {{ $areatwo = str_replace(array('["','"]'),'',$area2)}}

  {{ $property1 = Plots::select('propertyvalue')->where('id',$plot->mergone)->onlyTrashed()->pluck('propertyvalue');}}
  {{ $propertyone = str_replace(array('[',']'),'',$property1)}}

  {{ $property2 = Plots::select('propertyvalue')->where('id',$plot->mergtwo)->onlyTrashed()->pluck('propertyvalue');}}
  {{ $propertytwo = str_replace(array('[',']'),'',$property2)}}

  {{ $finance1 = Plots::select('financeamount')->where('id',$plot->mergone)->onlyTrashed()->pluck('financeamount');}}
  {{ $financeone = str_replace(array('[',']'),'',$finance1)}}

  {{ $finance2 = Plots::select('financeamount')->where('id',$plot->mergtwo)->onlyTrashed()->pluck('financeamount');}}
  {{ $financetwo = str_replace(array('[',']'),'',$finance2)}}

  {{ $date1 = Plots::select('date')->where('id',$plot->mergone)->onlyTrashed()->pluck('date');}}
  {{ $dateone = str_replace(array('["','"]'),'',$date1)}}

  {{ $date2 = Plots::select('date')->where('id',$plot->mergtwo)->onlyTrashed()->pluck('date');}}
  {{ $datetwo = str_replace(array('["','"]'),'',$date2)}}

  <tr>
    <td></td>
    <td>First</td>
    <td>{{$clientone}}</td>
    <td>{{$clientnameone}}</td>
    <td>{{$plotone}}</td>
    <td>{{$areaone}}</td>
    <td>{{$propertyone}}</td>
    <td>{{$financeone}}</td>
    <td>{{$dateone}}</td>


    
  </tr>
  <tr>
    <td></td>
    <td>Second</td>
    <td>{{$clienttwo}}</td>
    <td>{{$clientnametwo}}</td>
    <td>{{$plottwo}}</td>
    <td>{{$areatwo}}</td>
    <td>{{$propertytwo}}</td>
    <td>{{$financetwo}}</td>
    <td>{{$datetwo}}</td>


    
  </tr>
  <tr>
    <td>{{$i++}}</td>
    <td>Merged</td>
    <td>{{$plot->clientno}}</td>
    <td>{{$client}}</td>
    <td>{{$plot->plotno}}</td>
    <td>{{$plot->areaname}}</td>
    <td>{{$plot->propertyvalue}}</td>
    <td>{{$plot->financeamount}}</td>
    <td>{{$plot->date}}</td>


    
  </tr>
  
  <tr class="table-primary">
    <td colspan="9" ></td>
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
