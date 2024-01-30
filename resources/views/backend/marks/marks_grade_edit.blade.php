@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Grade Marks</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.marks.grade',$editData->id) }}" >
						@csrf
					  <!-- <div class="row"> -->
						<!-- <div class="col-12"> -->



							<div class="row"> <!-- Start first row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Grade Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="grade_name" value="{{ $editData->grade_name }}" class="form-control" required>
											@error('grade_name')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Grade Point <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="grade_point" value="{{ $editData->grade_point }}" class="form-control" required>
											@error('grade_point')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Start Mark <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="start_mark" value="{{ $editData->start_mark }}" class="form-control" required>
											@error('start_mark')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>



							</div> <!-- End first row -->



							<div class="row"> <!-- Start 2nd row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>End Mark <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="end_mark" value="{{ $editData->end_mark }}" class="form-control" required>
											@error('end_mark')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Start Point <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="start_point" value="{{ $editData->start_point }}" class="form-control" required>
											@error('start_point')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>End Point <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="end_point" value="{{ $editData->end_point }}" class="form-control" required>
											@error('end_point')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

							</div> <!-- End 2nd row -->	




							<div class="row"> <!-- Start 3rd row -->



								<div class="col-md-4">
									<div class="form-group">
										<h5>Remarks <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="remarks" value="{{ $editData->remarks }}" class="form-control" required>
											@error('remarks')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

							

							</div> <!-- End 3rd row -->	





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

@endsection