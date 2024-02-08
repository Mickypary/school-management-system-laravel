@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">
		  <div class="row">

		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">View <strong>Mark Sheets</strong></h4>
				  </div>

				  <div class="box-body">

				  	<form method="get" action="{{ route('report.marksheet.get') }}" target="_blank">
				  		@csrf
				  		<div class="row">

				  			<div class="col-md-3">
								<div class="form-group">
									<h5>Academic Year <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="year_id" id="year_id" class="form-control">
											<option value="" selected disabled>Select Year</option>
											@foreach($years as $year)
											<option value="{{ $year->id }}">{{ $year->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<h5>Class <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="class_id" id="class_id" class="form-control">
											<option value="" selected disabled>Select Class</option>
											@foreach($classes as $class)
											<option value="{{ $class->id }}">{{ $class->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<h5>Exam Type <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="exam_type_id" id="exam_type_id" class="form-control">
											<option value="" selected disabled>Select Class</option>
											@foreach($exam_types as $exam)
											<option value="{{ $exam->id }}">{{ $exam->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>


							<div class="col-md-3">
								<div class="form-group">
									<h5>ID No <span class="text-danger"></span></h5>
									<div class="controls">
										<input type="text" name="id_no" class="form-control" required="">
									</div>
								</div>
							</div>

							<div class="col-md-3">
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