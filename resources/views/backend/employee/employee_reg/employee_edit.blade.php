@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Employee</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('update.employee.reg', $editData->id) }}" enctype="multipart/form-data">
						@csrf
					  <!-- <div class="row"> -->
						<!-- <div class="col-12"> -->



							<div class="row"> <!-- Start first row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Employee Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" value="{{ $editData->name }}" class="form-control" required>
											@error('name')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Mobile <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control" required>
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
											<textarea name="address" cols="40" rows="2">{{$editData->address}}</textarea>
										</div>
									</div>
								</div>


							</div> <!-- End first row -->



							<div class="row"> <!-- Start 2nd row -->

								<div class="col-md-4">
									<div class="form-group">
										<h5>Gender <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="gender" id="gender" class="form-control">
												<option value="">Select Gender</option>
												<option value="male" {{ ($editData->gender == 'male' ? 'selected' : '')}}>Male</option>
												<option value="female" {{ ($editData->gender == 'female' ? 'selected' : '')}}>Female</option>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Religion <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="religion" id="religion" class="form-control">
												<option value="">Select Religion</option>
												<option value="Christianity" {{ ($editData->religion == 'Christianity' ? 'selected' : '')}}>Christianity</option>
												<option value="Muslim" {{ ($editData->religion == 'Muslim' ? 'selected' : '')}}>Muslim</option>
												<option value="Hindu" {{ ($editData->religion == 'Hindu' ? 'selected' : '')}}>Hindu</option>
												<option value="Others" {{ ($editData->religion == 'Others' ? 'selected' : '')}}>Others</option>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Date Of Birth <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="dob" value="{{$editData->dob}}" class="form-control" required>
											@error('dob')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>

							</div> <!-- End 2nd row -->	




							<div class="row"> <!-- Start 3rd row -->



								<div class="col-md-4">
									<div class="form-group">
										<h5>Designation <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="designation_id" id="designation_id" class="form-control">
												<option value="" selected disabled>Select Designation</option>
												@foreach($designation as $des)
												<option value="{{ $des->id }}" {{ ($editData->designation_id == $des->id ? 'selected' : '')}}>{{ $des->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="email" value="{{$editData->email}}" class="form-control" required>
											@error('email')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>



								@if(!@$editData)
								<div class="col-md-4">
									<div class="form-group">
										<h5>Join Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="join_date" value="{{$editData->join_date}}" class="form-control" required>
											@error('join_date')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>
								@endif
							

							</div> <!-- End 3rd row -->	


							<div class="row"> <!-- Start 4th row -->


								
							

							</div> <!-- End 4th row -->	




							<div class="row"> <!-- Start 5th row -->


								@if(!@$editData)
								<div class="col-md-4">
									<div class="form-group">
										<h5>Salary <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="salary" value="{{$editData->salary}}" class="form-control" required>
											@error('salary')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>
								@endif
								

								<div class="col-md-4">
									<div class="form-group">
										<h5>Profile Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" id="image" name="image" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<div class="controls" >
											<img id="showImage" src="{{ (!empty($editData->image) ? url('upload/employee_images/'.$editData->image) : url('upload/no_image.jpg')) }}" style="width: 100px; height: 100px; border:1px solid #000000">
										</div>
									</div>
								</div>
							

							</div> <!-- End 5th row -->


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