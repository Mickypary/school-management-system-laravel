@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js"></script>
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="content">
		  <div class="row">

		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Exam Fee</strong></h4>
				  </div>

				  <div class="box-body">

				  		<div class="row">

				  			<div class="col-md-4">
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

							<div class="col-md-4">
								<div class="form-group">
									<h5>Student Class <span class="text-danger"></span></h5>
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

							<div class="col-md-4" style="padding-top: 25px;">
								<a id="search" class="btn btn-primary" name="search">Search</a>
							</div>

				  		</div> <!-- End Row -->

				  		<!-- ////////////////////// Registration Fee Table /////////////////////////////////// -->

				  		<div class="row">
				  			<div class="col-md-12">
										<div id="DocumentResults">

										</div>
				  			</div>
				  		</div>

				  </div>
				</div>
			</div>  <!-- End Firsr Col-12 -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->



<!-- ============ Get Registration Fee Method And View Page =================== -->

<script type="text/javascript" defer>
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
     $.ajax({
      url: "{{ route('student.exam.fee.classwise.get')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id},
      // beforeSend: function() {       
      // },
      success: function (data) {
        $('#DocumentResults').html(data);
        // $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
<!-- ============ End Script Get Registration Fee Method And View Page ================= -->



@endsection