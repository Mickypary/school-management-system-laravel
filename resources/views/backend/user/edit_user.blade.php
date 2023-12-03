@extends('admin.admin_master')
@section('admin')


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('user.update', $userData->id) }}">
						@csrf
					  <div class="row">
						<div class="col-12">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>User Role <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="usertype" id="usertype" required="" class="form-control">
												<option value="" selected disabled>Select Role</option>
												<option {{ ($userData->usertype == 'admin' ? 'selected' : '') }} value="admin">Admin</option>
												<option {{ ($userData->usertype == 'user' ? 'selected' : '') }} value="user">User</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<h5>User Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" value="{{ $userData->name }}" class="form-control" required="">
										</div>
									</div>
								</div>
							</div> <!-- End inner row -->	



							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>User Email <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="email" name="email" value="{{ $userData->email }}" class="form-control" required="">
										</div>
									</div>
								</div>
								<!-- <div class="col-md-6">
									<div class="form-group">
										<h5>Password <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="password" name="password" class="form-control" required="">
										</div>
									</div>
								</div> -->
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



@endsection