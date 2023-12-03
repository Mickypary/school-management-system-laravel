@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Manage Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
						@csrf
					  <div class="row">
						<div class="col-12">

							<div class="row"> <!-- Start first Inner row -->

								<div class="col-md-6">
									<div class="form-group">
										<h5>User Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" value="{{ $userData->name }}" class="form-control" required="">
										</div>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<h5>User Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="email" name="email" value="{{ $userData->email }}" class="form-control" required="">
										</div>
									</div>
								</div>

							</div> <!-- End first Inner row -->


							<div class="row"> <!-- Start second Inner row -->

								<div class="col-md-6">
									<div class="form-group">
										<h5>Mobile <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="mobile" value="{{ $userData->mobile }}" class="form-control" required="">
										</div>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<h5>Address <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="address" value="{{ $userData->address }}" class="form-control" required="">
										</div>
									</div>
								</div>

							</div> <!-- End second Inner row -->


								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>Gender <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="gender" id="gender" required="" class="form-control">
												<option value="" selected disabled>Select Gender</option>
												<option {{ ($userData->gender == 'male' ? 'selected' : '') }} value="male">Male</option>
												<option {{ ($userData->gender == 'female' ? 'selected' : '') }} value="female">Female</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5>Profile Image <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="file" id="image" name="image" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<div class="controls" >
											<img id="showImage" src="{{ !empty($userData->image) ? asset('upload/user_images/'.$userData->image) : asset('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border:1px solid #000000">
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