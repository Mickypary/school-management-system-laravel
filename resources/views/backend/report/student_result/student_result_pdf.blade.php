<!DOCTYPE html>
<html>
<head>
<style>

 .page-break {
  page-break-after: always;
}

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
      <p>Student Result</p>
    </td>
  </tr>
</table>

<br><br>
<strong>Result for : </strong> {{ $allData[0]['exam_type']->name }}

<br><br>


<table id="customers">


  <div class="row"> <!-- Start 2nd row -->

              <div class="col-md-6">
              
                <table border="1" style="border-color: #ffffff" width="100%" cellpadding="8" cellspacing="2">

                  @php

                    $assign_student = App\Models\AssignStudent::where('year_id',$allData[1]['year_id'])->where('class_id',$allData[0]['class_id'])->first();

                  @endphp


                  <tr>
                    <td width="50%">Student ID</td>
                    <td width="50%">{{ $allData[0]->id_no }}</td>
                  </tr>

                  <tr>
                    <td width="50%">Roll No</td>
                    <td width="50%">{{ $assign_student->roll }}</td>
                  </tr>

                  <tr>
                    <td width="50%">Name</td>
                    <td width="50%">{{ $allData[0]['student']->name }}</td>
                  </tr>

                  <tr>
                    <td width="50%">class</td>
                    <td width="50%">{{ $allData[0]['student_class']->name }}</td>
                  </tr>

                  <tr>
                    <td width="50%">Session</td>
                    <td width="50%">{{ $allData[0]['year']->name }}</td>
                  </tr>

                  
                </table>

                </div> <!-- End Col-md-6 -->



                

            </div> <!-- End 2nd row -->




            <!-- =============================== Start Marksheet  ==================== ==================== -->
<br><br>
      <div class="row"> <!-- 3td row start -->
        <div class="col-md-12">

<table border="1" style="border-color: #ffffff;" width="100%" cellpadding="1" cellspacing="1">
<thead>
  <tr>
    <th class="text-center">SL</th>

    <th class="text-center">Subjects</th>
    <th class="text-center">Get Marks</th>
    <th class="text-center">Letter Grade</th>
    <th class="text-center">Grade Point</th>    
  </tr>
</thead>

<tbody>
  @php
      $total_marks = 0;
      $total_point = 0;
  @endphp

@foreach($allData as $key => $mark)
@php
  $get_mark = $mark->marks;
  $total_marks = (float)$total_marks+(float)$get_mark;
  $subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get();

  $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->get()->count();
@endphp
<tr>
  <td class="text-center">{{ $key+1 }}</td>

  <td class="text-center">{{ $subject[$key]['subject']->name }}</td>

  <td class="text-center">{{ $get_mark }}</td>

@php
  $grade_marks = App\Models\MarksGrade::where([['start_mark','<=', (int)$get_mark],['end_mark', '>=',(int)$get_mark ]])->first();
    // dd($get_mark);
  $grade_name = $grade_marks->grade_name;
  $grade_point = number_format((float)$grade_marks->grade_point,2);
  $total_point = (float)$total_point+(float)$grade_point;
@endphp
<td class="text-center">{{ $grade_name }}</td>
<td class="text-center">{{ $grade_point }}</td>

</tr>
@endforeach

<tr>
  <td colspan="3"><strong style="padding-left: 30px;">Total Maks</strong></td>
  <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
</tr>

</tbody>
          </table>

        </div> <!-- // end Col md -12    -->     
      </div> <!-- end 3td row start -->



      <br><br>

            

           


  
  
</table>

<!-- For Page break -->
<!-- <div class="page-break"></div> -->







<br>
<i style="font-size: 10px; float: right;">Print Date: {{ date('d M Y') }}</i>

<hr style="border: dashed 2px; width: 95%; color: #000; margin-bottom: 40px; margin-top: 30px;">

  

</body>
</html>


