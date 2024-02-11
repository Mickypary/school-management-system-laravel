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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <td>
      <h2>
         <?php $image_path = '/upload/easyschool.png'; ?>
         <img src="{{ public_path() . $image_path }}" width="200" height="100">
      </h2>
    </td>
    <td>
      <h2>Mickypary School ERP</h2>
      <p>School Address</p>
      <p>Phone : +2348138600137</p>
      <p>Email : info@mrichtec.com</p>
      <p>Employee Attendance Report</p>
    </td>
  </tr>
</table>

<br><br>
<strong>Employee Name: </strong> {{ $allData[0]['user']->name }}, <strong>ID No: </strong> {{ $allData[0]['user']->id_no }}, <strong>Month: </strong> {{ $month }}

<br><br>


<table id="customers">


  <tr>
    <td width="50%"><h4>Date</h4></td>
    <td width="50%"><h4>Attendance Status</h4></td>
  </tr>

  @foreach($allData as $key => $attend)
  <tr>
    <td width="50%">{{ date('d-m-Y', strtotime($attend->date)) }}</td>
    <td width="50%">{{ $attend->attendance_status }}</td>
  </tr>
  @endforeach

  <tr>
    <td colspan="2"><strong>Total Absent: </strong> {{ $absent_count }}, <strong>Total Leave: </strong> {{ $leave_count }}, <strong>Total Present: </strong> {{ $present_count }}</td>
  </tr>
  
</table>



<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000; margin-bottom: 40px; margin-top: 30px;">

  

</body>
</html>


