@extends('admin.admin_master')
@section('admin')

<section class="content">
	<div class="row">
		<div class="col-12">

<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h3 class="widget-user-username">User Name: {{ $user->name }}</h3>

					  <a href="{{ route('profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success">Edit User</a>

					  <h6 class="widget-user-desc">Role: {{ $user->usertype }}</h6>
					  <h6 class="widget-user-desc">Email: {{ $user->email }}</h6>

					  
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src="{{ !empty($user->image) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" style="width: 100px; height: 100px" alt="User Avatar">
					</div>
					<br>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Mobile</h5>
							<span class="description-text">{{ $user->mobile }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">Address</h5>
							<span class="description-text">{{ $user->address }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">Gender</h5>
							<span class="description-text">{{ $user->gender }}</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>



  </div>
</div>

</section>




@endsection