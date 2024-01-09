@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Search <strong>Student</strong></h4>
				  </div>

				  <div class="box-body">

				  	<form method="GET" action="{{ route('student.year.class.filter')}}">
				  		<div class="row">

				  			<div class="col-md-4">
								<div class="form-group">
									<h5>Academic Year <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="year_id" id="year_id" class="form-control">
											<option value="" selected disabled>Select Year</option>
											@foreach($years as $year)
											<option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? 'selected' : '' }}  >{{ $year->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<h5>Student Class <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="class_id" id="class_id" class="form-control">
											<option value="" selected disabled>Select Class</option>
											@foreach($classes as $class)
											<option value="{{ $class->id }}"  {{ (@$class_id == $class->id) ? 'selected' : '' }}>{{ $class->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-4" style="padding-top: 25px;">
								<input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
							</div>

				  		</div>
				  	</form>

				  </div>
				</div>
			</div>  <!-- End Firsr Col-12 -->


		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student List</h3>
				  <a href="{{ route('student.reg.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Student</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Name</th>
								<th>Reg No.</th>
								<th>Roll</th>
								<th>Year</th>
								<th>Class</th>
								<th>Image</th>
								@if(Auth::user()->role == 'Admin')
								<th>Code</th>
								@endif
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value['student']['name'] }}</td>
								<td>{{ $value['student']['id_no'] }}</td>
								<td>{{ $value->roll }}</td>
								<td>{{ $value['student_year']['name'] }}</td>
								<td>{{ $value['student_class']['name'] }}</td>
								<td>
									<img src="{{ !empty($value['student']['image']) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 50px; height: 50px;">
								</td>
								<td>{{ $value['student']['code'] }}</td>
								<td>
									<a class="btn btn-md btn-info" href="{{ route('student.registration.edit', [$value->student_id, $value->year_id]) }}"><i class="fa fa-edit"></i></a> |
									<a id="" class="btn btn-md btn-primary" href="{{ route('student.registration.promotion', $value->student_id) }}"><i class="fa fa-check"></i></a> |
									<a class="btn btn-md btn-danger" href="{{ route('student.registration.details', $value->student_id) }}" target="_blank" rel="noreferrer"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							@endforeach

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
         
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->



@endsection