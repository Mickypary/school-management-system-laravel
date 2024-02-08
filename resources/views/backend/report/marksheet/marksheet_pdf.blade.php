@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">
		  <div class="row">

		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Generate <strong>Mark Sheets</strong></h4>
				  </div>

				  <div class="box-body" style="border: solid 1px; padding: 10px;">

				  	<div class="row"> <!-- Start 1st row -->
				  		<div class="col-md-2 text-center" style="float: right;">
				  			<img src="{{ url('upload/easyschool.png') }}" style="width: 120px; height: 100px;">
				  		</div>

				  		<div class="col-md-2 text-center">
				  			
				  		</div>

				  		<div class="col-md-4 text-center" style="float: left;">
				  			<h4><strong>MrichTech Expert Solutions</strong></h4>
				  			<h6><strong>Lagos Nigeria</strong></h6>
				  			<h5><strong><u><i>Academic Transcript</i></u></strong></h5>
				  			<h6><strong>{{ $allMarks[0]['exam_type']->name }}</strong></h6>
				  		</div>

				  		<div class="col-md-12">
				  			<hr style="border: solid 1px; width: 100%; color: #ddd; margin-bottom: 0px;">
				  			<p style="text-align: right"><u><i>Print Date: </i>{{ date('d M Y') }}</u></p>
				  		</div>

				  	</div> <!-- End 1st row -->


				  	<div class="row"> <!-- Start 2nd row -->

				  		<div class="col-md-6">
				  		
				  			<table border="1" style="border-color: #ffffff" width="100%" cellpadding="8" cellspacing="2">

				  				@php

				  					$assign_student = App\Models\AssignStudent::where('year_id',$allMarks[0]['year_id'])->where('class_id',$allMarks[0]['class_id'])->first();

				  				@endphp

				  				<tr>
				  					<td width="50%">Student ID</td>
				  					<td width="50%">{{ $allMarks[0]->id_no }}</td>
				  				</tr>

				  				<tr>
				  					<td width="50%">Roll No</td>
				  					<td width="50%">{{ $assign_student->roll }}</td>
				  				</tr>

				  				<tr>
				  					<td width="50%">Name</td>
				  					<td width="50%">{{ $allMarks[0]['student']->name }}</td>
				  				</tr>

				  				<tr>
				  					<td width="50%">class</td>
				  					<td width="50%">{{ $allMarks[0]['student_class']->name }}</td>
				  				</tr>

				  				<tr>
				  					<td width="50%">Session</td>
				  					<td width="50%">{{ $allMarks[0]['year']->name }}</td>
				  				</tr>
				  				
				  			</table>

				  			</div> <!-- End Col-md-6 -->



				  			<div class="col-md-6">
				  		
				  			<table border="1" style="border-color: #ffffff" width="100%" cellpadding="8" cellspacing="2">

				  				<thead>
				  					<tr>
				  						<th>Letter Grade</th>
				  						<th>Marks Interval</th>
				  						<th>Grade Point</th>
				  					</tr>
				  				</thead>
				  				<tbody>
				  					@foreach($allGrades as $key => $grade)
				  					<tr>
				  						<td>{{ $grade->grade_name }}</td>
				  						<td>{{ $grade->start_mark }} - {{ $grade->end_mark }}</td>
				  						<td>{{ number_format((float)$grade->grade_point,2) }}</td>
				  					</tr>
				  					@endforeach
				  				</tbody>
				  				
				  			</table>

				  			</div> <!-- End Col-md-6 -->

				  	</div> <!-- End 2nd row -->






				<!-- -------------------------------------------------------------------------------------- -->
				  </div>
				</div>
			</div>  <!-- End Firsr Col-12 -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->





@endsection