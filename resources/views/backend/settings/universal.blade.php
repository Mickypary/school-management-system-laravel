@extends('admin.admin_master')
@section('admin')


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Universal Settings</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('store.student.group') }}">
						@csrf
					  <div class="row">
						<div class="col-12">


			<div class="box-body">
				<div class="form-group row">
					<label class="col-form-label col-md-2">Institution Name</label>
					<div class="col-md-10">
						<input class="form-control" name="institute_name" type="text">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-2">Institution Code</label>
					<div class="col-md-10">
						<input class="form-control" name="institution_code" type="text">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-2">Mobile No</label>
					<div class="col-md-10">
						<input class="form-control" name="mobileno" type="text">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-2">Address</label>
					<div class="col-md-10">
						<textarea name="address" rows="2" class="form-control"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-2">Currency</label>
					<div class="col-md-10">
						<input class="form-control" name="currency" type="text">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-2">Currency Symbol</label>
					<div class="col-md-10">
						<input class="form-control" name="currency_symbol" type="text">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-2">Academic Session</label>
					<div class="col-md-10">
						<select name="employee_id" required="" class="form-control">
							<option value="" selected disabled>Select Employee</option>
							<option value=""></option>
						</select>
					</div>
				</div>
		
			</div>


						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Save">
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