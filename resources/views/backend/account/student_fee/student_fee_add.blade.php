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
					<h4 class="box-title">Add <strong>Student Fee</strong></h4>
				  </div>

				  <div class="box-body">

				  		<div class="row">

				  			<div class="col-md-3">
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

							<div class="col-md-3">
								<div class="form-group">
									<h5>Class <span class="text-danger"></span></h5>
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

							<div class="col-md-3">
								<div class="form-group">
									<h5>Fee Category <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="fee_category_id" id="fee_category_id" class="form-control">
											<option value="" selected disabled>Select Fee Category</option>
											@foreach($fee_category as $cat)
											<option value="{{ $cat->id }}">{{ $cat->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
										<h5>Date <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="month" name="date" min="1975-01" id="date" value="{{ date('Y-m-d') }}" class="form-control">
											@error('name')
												<span class="text-danger">{{ $message }}</span> 
											@enderror
										</div>
									</div>
							</div>

							<div class="col-md-3" style="margin-bottom: 10px">
								<a id="search" class="btn btn-primary" name="search">Search</a>
							</div>

				  		</div> <!-- End Row -->

				  		<!-- ////////////////////// Student Fee Add Table /////////////////////////////////// -->

				  		
					  		<div class="row">
					  			<div class="col-md-12">
					  							
												<form method="post" action="{{route('account.fee.store')}}">
				  								@csrf
				  								<div id="DocumentResults">

				  								</div>

				  								<input id="btn-hide" type="submit" class="btn btn-primary d-none" value="Submit">
												</form>
											
					  			</div>
					  		</div>
					  		


					  		<!-- For HandleBar JS Start -->

					  		<!-- <div class="row"> 
					  			<div class="col-md-12">
											<div id="DocumentResults">
												<script id="document-template" type="text/x-handlebars-template">
													<form action="{{ route('account.fee.store') }}" method="post">
														@csrf
													<table class="table table-bordered table-striped" style="width: 100%;">
										  			<thead>
										  				<tr>
										  					@{{{thsource}}}
										  				</tr>
										  			</thead>
										  			<tbody>
										  				@{{#each this}}
										  				<tr>
										  					@{{{tdsource}}}
										  				</tr>
										  				@{{/each}}			  				
										  			</tbody>
										  		</table>
										  		<button class="btn btn-primary" type="submit" style="margin-top: 10px;">Submit</button>
										  	</form>
												</script>										
											</div>	

					  			</div>
					  		</div>  -->

					  		<!-- For HandleBar JS End -->

					  		
				  	

				  </div>
				</div>
			</div>  <!-- End Firsr Col-12 -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->



		<!-- ============ Get Registration Fee Method And View Page  using HandleBar JS=================== -->

<!-- <script type="text/javascript" defer>
  $(document).on('click','#search',function(){
  	var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var fee_category_id = $('#fee_category_id').val();
    var date = $('#date').val();
     $.ajax({
      url: "{{ route('account.fee.getStudent')}}",
      type: "get",
      data: {'year_id':year_id, 'class_id':class_id, 'fee_category_id':fee_category_id, 'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script> -->
<!-- ============ End Script Get Registration Fee Method And View Page ================= -->




<script type="text/javascript">
  $(document).on('click','#search',function(){
  	$('#btn-hide').removeClass('d-none');
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var fee_category_id = $('#fee_category_id').val();
    var date = $('#date').val();
     $.ajax({
      url: "{{ route('account.fee.getStudent')}}",
      type: "get",
      data: {'year_id':year_id, 'class_id':class_id, 'fee_category_id':fee_category_id, 'date':date},

      success: function (data) {
        $('#DocumentResults').html(data);
        // $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>





@endsection