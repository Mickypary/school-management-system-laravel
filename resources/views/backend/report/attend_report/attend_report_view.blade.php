@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">
		  <div class="row">

		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">View <strong>Employee Attendance</strong></h4>
				  </div>

				  <div class="box-body">

				  	<form method="get" action="{{ route('report.attendance.get') }}" target="_blank">
				  		@csrf
				  		<div class="row">

				  			<div class="col-md-4">
								<div class="form-group">
									<h5>Employee Name <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="employee_id" id="employee_id" class="form-control">
											<option value="" selected disabled>Select Employee</option>
											@foreach($employees as $employee)
											<option value="{{ $employee->id }}">{{ $employee->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>


							<div class="col-md-4">
								<div class="form-group">
									<h5>Date<span class="text-danger"></span></h5>
									<div class="controls">
										<input type="date" name="date" class="form-control" required="">
									</div>
								</div>
							</div>

							<div class="col-md-4" style="padding-top: 25px;">
								<input type="submit" value="Search" class="btn btn-primary btn-rounded">
							</div>

				  		</div> <!-- End Row -->

				  		<!-- ////////////////////// Roll Generate Table /////////////////////////////////// -->

				  		

				  	</form>

				  </div>
				</div>
			</div>  <!-- End Firsr Col-12 -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->





@endsection