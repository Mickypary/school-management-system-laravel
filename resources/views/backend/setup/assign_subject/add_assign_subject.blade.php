@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Assign Subject</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('store.fee.amount') }}">
						@csrf
					  <div class="row">
						<div class="col-12">
							<div class="add_item">


							<div class="form-group">
								<h5>Student Class <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="class_id" id="select" required="" class="form-control">
										<option value="" selected disabled>Select Class</option>
										@foreach($classes as $class)
										<option value="{{ $class->id }}">{{ $class->name }}</option>
										@endforeach
									</select>
								</div>
							</div>


							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<h5>Student Subject <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="subject_id[]" id="select" required="" class="form-control">
												<option value="" selected disabled>Select Subject</option>
												@foreach($subjects as $subject)
												<option value="{{ $subject->id }}">{{ $subject->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div> <!-- End col-md-5 -->


								<div class="col-md-2">
									<div class="form-group">
										<h5>Full Mark <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="full_mark[]" class="form-control">
										</div>
									</div>
								</div> <!-- End col-md-5 -->

								<div class="col-md-2">
									<div class="form-group">
										<h5>Pass Mark <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="pass_mark[]" class="form-control">
										</div>
									</div>
								</div> <!-- End col-md-5 -->

								<div class="col-md-2">
									<div class="form-group">
										<h5>Subjective Mark <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="subjective_mark[]" class="form-control">
										</div>
									</div>
								</div> <!-- End col-md-5 -->


								<div class="col-md-2" style="padding-top: 25px;">
									<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
								</div> <!-- End col-md-2 -->
							</div> <!-- End row -->

						</div> <!-- End add item div -->

									


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


		  <!-- Another DIV for javascript functionality -->
		  <div style="visibility: hidden;">
		  	<div class="extra_item_add" id="extra_item_add">
		  		<div class="delete_extra_item" id="delete_extra_item">
		  			<div class="form-row">
		  				<div class="col-md-4">
							<div class="form-group">
								<h5>Student Subject <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subject_id[]" id="select" required="" class="form-control">
										<option value="" selected disabled>Select Subject</option>
										@foreach($subjects as $subject)
												<option value="{{ $subject->id }}">{{ $subject->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div> <!-- End col-md-5 -->

						<div class="col-md-2">
							<div class="form-group">
								<h5>Full Mark <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="full_mark[]" class="form-control">
								</div>
							</div>
						</div> <!-- End col-md-5 -->

						<div class="col-md-2">
							<div class="form-group">
								<h5>Pass Mark <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="pass_mark[]" class="form-control">
								</div>
							</div>
						</div> <!-- End col-md-5 -->

						<div class="col-md-2">
							<div class="form-group">
								<h5>Subjective Mark <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subjective_mark[]" class="form-control">
								</div>
							</div>
						</div> <!-- End col-md-5 -->

						<div class="col-md-2" style="padding-top: 25px;">
							<span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
							<span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
						</div> <!-- End col-md-2 -->
		  			</div>
		  		</div>
		  	</div>
		  </div>

		</section>

		<script type="text/javascript">
			$(document).ready(function () {
				var counter = 0;
				$(document).on('click','.addeventmore', function () {
					var extra_item_add = $('#extra_item_add').html();
					$(this).closest('.add_item').append(extra_item_add);
					counter++;
				});
				$(document).on('click','.removeeventmore', function (e) {
					$(this).closest('.delete_extra_item').remove();
					counter -= 1
				});
			});
		</script>



@endsection