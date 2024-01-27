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
      <p>Phone : 343434343434</p>
      <p>Email : info@mickyparyserp.com</p>
      <p>Employee Monthly Salary</p>
    </td>
  </tr>
</table>


@php

    $date = date('Y-m', strtotime($details[0]->date));
     if ($date !='') {
        $where[] = ['date','like',$date.'%'];
     }

     $totalattend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$details[0]->employee_id)->where('attendance_status','Absent')->get();

     $absentcount = count($totalattend);

      $salary = (float)$details[0]['user']['salary'];
      $salaryperday = (float)$salary/30;
      $totalsalaryminus = (float)$absentcount*(float)$salaryperday;
      $totalsalary = (float)$salary-(float)$totalsalaryminus;



@endphp

<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee ID.</b></td>
    <td>{{ $details[0]['user']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Employee Name</b></td>
    <td>{{ $details[0]['user']['name'] }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Basic Salary</b></td>
    <td>${{ $details[0]['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Total Absent for this month</b></td>
    <td>{{ $absentcount }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Salary for this month</b></td>
    <td>${{ $totalsalary }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Month</b></td>
    <td>{{ date('M Y', strtotime($details[0]['date'])) }}</td>
  </tr>
</table>

<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000; margin-bottom: 40px; margin-top: 30px;">


<table id="customers">
  <tr>
    <th width="10%">Sl</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee ID.</b></td>
    <td>{{ $details[0]['user']['id_no'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Employee Name</b></td>
    <td>{{ $details[0]['user']['name'] }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Basic Salary</b></td>
    <td>${{ $details[0]['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Total Absent for this month</b></td>
    <td>{{ $absentcount }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Salary for this month</b></td>
    <td>${{ $totalsalary }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Month</b></td>
    <td>{{ date('M Y', strtotime($details[0]['date'])) }}</td>
  </tr>
</table>

<br><br>
<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
  

</body>
</html>


