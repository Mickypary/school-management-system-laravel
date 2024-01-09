@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Student Promotion</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('student.update.promotion', $editData->student_id) }}" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="id" value="{{ $editData->id }}">



							<div class="row"> <!-- Start first row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" disabled value="{{ $editData['student']['name'] }}" class="form-control" required>
											@error('name')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Father's Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="fname" disabled value="{{ $editData['student']['fname'] }}" class="form-control" required>
											@error('fname')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Mother's Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="mname" disabled value="{{ $editData['student']['mname'] }}" class="form-control" required="" >
											@error('mname')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

							</div> <!-- End first row -->	


							<div class="row"> <!-- Start another row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Father's Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="father_email" disabled value="{{ $editData['student']['father_email'] }}" class="form-control" required>
											@error('father_email')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Mother's Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="mother_email" disabled value="{{ $editData['student']['mother_email'] }}" class="form-control" required>
											@error('mother_email')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Father's Mobile <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="father_mobile" disabled value="{{ $editData['student']['father_mobile'] }}" class="form-control" required="" >
											@error('father_mobile')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

							</div> <!-- End another row -->	



							<div class="row"> <!-- Start 2nd row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Mobile No. <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="mobile" disabled value="{{ $editData['student']['mobile'] }}" class="form-control" required>
											@error('mobile')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Address <span class="text-danger">*</span></h5>
										<div class="controls">
											<textarea name="address" disabled cols="40" rows="2">{{ $editData['student']['address'] }}</textarea>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Gender <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="gender" disabled id="gender" class="form-control">
												<option value="">Select Gender</option>
												<option value="male" {{ ($editData['student']['gender'] == 'male' ? 'selected' : '') }}>Male</option>
												<option value="female" {{ ($editData['student']['gender'] == 'female' ? 'selected' : '') }}>Female</option>
											</select>
										</div>
									</div>
								</div>

							</div> <!-- End 2nd row -->	




							<div class="row"> <!-- Start 3rd row -->


								<div class="col-md-4">
									<div class="form-group">
										<h5>Religion <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="religion" disabled id="religion" class="form-control">
												<option value="">Select Religion</option>
												<option value="Christianity" {{ ($editData['student']['religion'] == 'Christianity' ? 'selected' : '') }}>Christianity</option>
												<option value="Muslim" {{ ($editData['student']['religion'] == 'Muslim' ? 'selected' : '') }}>Muslim</option>
												<option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu' ? 'selected' : '') }}>Hindu</option>
												<option value="Others" {{ ($editData['student']['religion'] == 'Others' ? 'selected' : '') }}>Others</option>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Date Of Birth <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="dob" disabled value="{{ $editData['student']['dob'] }}" class="form-control" required>
											@error('dob')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Discount <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="discount" value="{{ $editData['discount']['discount'] }}" class="form-control" required>
											@error('discount')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>
							

							</div> <!-- End 3rd row -->	


							<div class="row"> <!-- Start 4th row -->


								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Class <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="class_id" id="class_id" class="form-control">
												<option value="" selected disabled>Select Class</option>
												@foreach($classes as $class)
												<option value="{{ $class->id }}" {{ ($editData->class_id == $class->id ? 'selected' : '') }}>{{ $class->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Academic Year <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="year_id" id="year_id" class="form-control">
												<option value="" selected disabled>Select Year</option>
												@foreach($years as $year)
												<option value="{{ $year->id }}" {{ ($editData->year_id == $year->id ? 'selected' : '') }}>{{ $year->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Group <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="group_id" disabled id="group_id" class="form-control">
												<option value="" selected disabled>Select Group</option>
												@foreach($groups as $group)
												<option value="{{ $group->id }}" {{ ($editData->group_id == $group->id ? 'selected' : '') }}>{{ $group->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							

							</div> <!-- End 4th row -->	




							<div class="row"> <!-- Start 5th row -->


								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Shift <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="shift_id" disabled id="shift_id" class="form-control">
												<option value="" selected disabled>Select Shift</option>
												@foreach($shifts as $shift)
												<option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id ? 'selected' : '') }}>{{ $shift->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" id="image" name="image" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<div class="controls" >
											<img id="showImage" src="{{ !empty($editData['student']['image']) ? asset('upload/student_images/'.$editData['student']['image']) : asset('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border:1px solid #000000">
										</div>
									</div>
								</div>
							

							</div> <!-- End 5th row -->


						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Promote">
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
				$('#image').change(function (e) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#showImage').attr('src', e.target.result);
					}
					reader.readAsDataURL(e.target.files['0']);
				});
			});
		</script>



@endsection