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
					<h4 class="box-title">Employee <strong>Monthly Salary</strong></h4>
				  </div>

				  <div class="box-body">

				  		<div class="row">

				  			<div class="col-md-6">
									<div class="form-group">
										<h5>Attendance Date<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="month" min="1979-01" max="2026-12" value="2024-01" name="date" id="date" class="form-control">
										</div>
									</div>
								</div>


							<div class="col-md-6" style="padding-top: 25px;">
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
    var date = $('#date').val();
     $.ajax({
      url: "{{ route('employee.monthly.salary.get')}}",
      type: "get",
      data: {'date':date},
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