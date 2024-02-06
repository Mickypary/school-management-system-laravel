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
					<h4 class="box-title">Monthly / Yearly <strong>Profit</strong></h4>
				  </div>

				  <div class="box-body">

				  		<div class="row">

				  			<div class="col-md-4">
									<div class="form-group">
										<h5>Start Date<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="start_date" id="start_date" class="form-control">
										</div>
									</div>
								</div>


								<div class="col-md-4">
									<div class="form-group">
										<h5>End Date<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="end_date" id="end_date" class="form-control">
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
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
     $.ajax({
      url: "{{ route('report.profit.datewise.get')}}",
      type: "get",
      data: {'start_date':start_date,'end_date':end_date},
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