@extends('admin.admin_master')
@section('admin')


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Attendance</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('store.employee.attendance') }}">
						@csrf
					  <div class="row">
						<div class="col-12">


							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<h5>Attendance Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="date" class="form-control">
											@error('name')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

							</div> <!-- End inner row -->	

							<div class="row">
								<div class="col-md-12">
							
									<table class="table table-bordered table-striped" style="width: 100%;">
										<thead>
											<tr>
												<th rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
												<th rowspan="2" class="text-center" style="vertical-align: middle;">Photo</th>
												<th rowspan="2" class="text-center" style="vertical-align: middle;">Name</th>
												<th rowspan="2" class="text-center" style="vertical-align: middle;">Employee ID</th>
												<th colspan="3" class="text-center" style="vertical-align: middle;" width="30%">Status</th>
											</tr>
											<tr>
												<th class="text-center btn present_all" style="display: table-cell; background-color: #000000;">Present</th>
												<th class="text-center btn leave_all" style="display: table-cell; background-color: #000000;">Leave</th>
												<th class="text-center btn absent_all" style="display: table-cell; background-color: #000000;">Absent</th>
											</tr>
										</thead>
										<tbody>
											@foreach($employee as $key => $employees)
											<tr id="div{{$employees->id}}" class="text-center">
												<input type="hidden" name="employee_id[]" value="{{$employees->id}}">
												<td>{{ $key+1}}</td>
												<td ><img class="rounded-circle" src="{{ url('upload/employee_images/'.$employees->image)}}" width="40" height="40"></td>
												<td>{{ $employees->name }}</td>
												<td>{{ $employees->id_no }}</td>
												<td colspan="3">
													<div class="switch-toggle switch-3 switch-candy">
														<input name="attendance_status{{$key}}" value="Present" type="radio" id="present{{$key}}" checked="">
														<label for="present{{$key}}">Present</label>
														<input name="attendance_status{{$key}}" value="Leave" type="radio" id="leave{{$key}}" >
														<label for="leave{{$key}}">Leave</label>
														<input name="attendance_status{{$key}}" value="Absent" type="radio" id="absent{{$key}}" >
														<label for="absent{{$key}}">Absent</label>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>						



								</div>
							</div> <!-- End inner row -->	


						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>



@endsection