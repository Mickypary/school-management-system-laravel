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




  @php


    $student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

        $other_cost = App\Models\OtherAccountCost::whereBetween('date',[$sdate,$edate])->sum('amount');

        $emp_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

        $total_cost = $other_cost + $emp_salary;
        $profit = $student_fee - $total_cost;


  @endphp

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
      <p>School Address: Web Developer</p>
      <p>Phone : +2348138600137</p>
      <p>Email : info@mrichtec.com.com</p>
      <p><b>Monthly / Yearly Profit Report</b></p>
    </td>
  </tr>
</table>


<table id="customers">
  <tr>
    <td colspan="2" style="text-align: center;">
      <h4>Reporting Date: {{ date('d M Y', strtotime($sdate)) }} - {{ date('d M Y', strtotime($edate)) }}</h4>
    </td>
  </tr>
  <tr>
    <td width="50%"><h4>Description</h4></td>
    <td width="50%"><h4>Amount</h4></td>
  </tr>
  <tr>
    <td>Student Fee</td>
    <td>${{ $student_fee }}</td>
  </tr>
  <tr>
    <td>Employee Salary</td>
    <td>${{ $emp_salary }}</td>
  </tr>
  <tr>
    <td>Other Cost</td>
    <td>${{ $other_cost }}</td>
  </tr>  
  <tr>
    <td>Total Cost</td>
    <td>${{ $total_cost }}</td>
  </tr>  
  <tr>
    <td>Profit</td>
    <td>${{ $profit }}</td>
  </tr>  
</table>
<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>
  

</body>
</html>


