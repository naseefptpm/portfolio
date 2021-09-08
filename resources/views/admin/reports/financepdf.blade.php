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
    <td><h2>Finance Report</h2>
      <p>From Period of {{$from}} - {{$to}}</p>
      <p>Portfolio No : {{$id}}</p>
      <p>{{$currentDate}}</p>



    </td> 
  </tr>
  
   
</table>
 <br> <br>


<table id="customers">
   
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
        <td>{{$plot->block}}</td>
        <td>{{$plot->propertyvalue}}</td>
        <td>{{$plot->financeamount}}</td>
        <td>{{$plot->date}}</td>

        
      </tr>
      @endforeach
   
      <tr>
        <th  colspan="3" style="text-align: center;">Sum</th>
        
        <td>{{$propertyvalue}}</td>
 
        <td>{{$finance}}</td>
        <th></th>
      </tr>
</table>
<br> <br>

<hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

 
 

</body>
</html>
