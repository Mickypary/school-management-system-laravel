@extends('admin.admin_master')
@section('admin')


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Employee Salary Increment</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('store.increment.salary', $editData->id) }}">
						@csrf
					  <div class="row">
						<div class="col-12">



							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<h5>Salary Amount <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="increment_salary" class="form-control">
											@error('name')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
								</div>



								<div class="col-md-6">
									<div class="form-group">
										<h5>Effected Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="effected_salary_date" class="form-control">
										</div>
									</div>
								</div>


							</div> <!-- End inner row -->	


						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Add">
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