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
    <td><h2>Completed Task Report</h2>
      <p>From Period of {{$from}} - {{$to}}</p>
      <p>Portfolio No : {{$id}}</p>
      <p>{{$currentDate}}</p>



    </td> 
  </tr>
  
   
</table>
 <br> <br>


<table id="customers">
   
    <tr>
        <th>Sl No.</th>
        <th>Client No.</th>
        <th>Client Name</th>
        <th>Task Description</th>
        <th>Plot No</th>
        <th>Document Type</th>
        <th>Due Date</th>



      </tr>
      {{$i=1}}
      @foreach($tasks as $task)
      {{  $clientname = Clients::select('clientname')->where('id',$task->client)->pluck('clientname'); }}
      {{ $client = str_replace(array('["','"]'),'',$clientname)}}
      <tr>
        <td>{{$i++}}</td>
        <td>{{$task->client}}</td>
        <td>{{$client}}</td>
        <td>{{$task->taskdesc}}</td>
        <td>{{$task->plot}}</td>
        <td>{{$task->doctype}}</td>
        <td>{{$task->duedate}}</td>

        
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
