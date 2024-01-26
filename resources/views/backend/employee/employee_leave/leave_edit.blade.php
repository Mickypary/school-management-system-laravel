@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employee Leave</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.employee.leave', $editData->id)}}">
						@csrf
					  <div class="row">
						<div class="col-12">



							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<h5>Employee <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="employee_id" required="" class="form-control">
												<option value="" selected disabled>Select Employee</option>
												@foreach($employee as $employees)
												<option value="{{ $employees->id }}" {{ ($editData->employee_id == $employees->id ? 'selected' : '') }}>{{ $employees->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>



								<div class="col-md-6">
									<div class="form-group">
										<h5>Start Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="start_date" value="{{ $editData->start_date}}" class="form-control">
										</div>
									</div>
								</div>


							</div> <!-- End inner row -->	


							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<h5>Leave Purpose <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control">
												<option value="" selected disabled>Select Leave Purpose</option>
												@foreach($leave_purpose as $purpose)
												<option value="{{ $purpose->id }}" {{ ($editData->leave_purpose_id == $purpose->id ? 'selected' : '') }}>{{ $purpose->name }}</option>
												@endforeach
												<option value="0">New Purpose</option>
											</select>
											<input type="text" id="add_another" name="name" class="form-control" style="display: none;" value="Write Purpose">
										</div>
									</div>
								</div>



								<div class="col-md-6">
									<div class="form-group">
										<h5>End Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="end_date" value="{{ $editData->end_date}}" class="form-control">
										</div>
									</div>
								</div>


							</div> <!-- End inner row -->	


						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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



		<script type="text/javascript">
			$(document).ready(function () {
				$(document).on('change', '#leave_purpose_id',function () {
					var leave_purpose_id = $(this).val();
					if (leave_purpose_id == '0') {
						$('#add_another').show();
					}else {
						$('#add_another').hide();
					}
					
				});
			});
		</script>



@endsection