@extends('admin.admin_master')
@section('admin')
<!-- Jquery CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="content">
		  <div class="row">

		  	<div class="col-12">
		  	<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Marks Entry</strong></h4>
				  </div>

				  <div class="box-body">

				  	<form method="post" action="{{ route('marks.entry.store') }}">
				  		@csrf
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
									<h5>Subject <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="assign_subject_id" id="assign_subject_id" class="form-control">
											<option selected >Select Subject</option>
											
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<h5>Exam Type <span class="text-danger"></span></h5>
									<div class="controls">
										<select name="exam_type_id" id="exam_type_id" class="form-control">
											<option value="" selected disabled>Select Class</option>
											@foreach($exam_types as $exam)
											<option value="{{ $exam->id }}">{{ $exam->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<a id="search" class="btn btn-primary" name="search">Search</a>
							</div>

				  		</div> <!-- End Row -->

				  		<!-- ////////////////////// Roll Generate Table /////////////////////////////////// -->

				  		<div class="row d-none" id="marks-entry">
				  			<div class="col-md-12">
				  				<table class="table table-bordered table-striped" style="width: 100%; margin-top: 10px;">
				  					<thead>
				  						<tr>
				  							<th>#</th>
				  							<th>Photo</th>
				  							<th>ID No.</th>
				  							<th>Name</th>
				  							<th>Father Name</th>
				  							<th>Gender</th>
				  							<th>Marks</th>
				  						</tr>
				  					</thead>
				  					<tbody id="marks-entry-tr">

				  					</tbody>
				  				</table>
				  				<input type="submit" value="Submit" class="btn btn-primary btn-rounded">
				  			</div>
				  		</div>

				  	</form>

				  </div>
				</div>
			</div>  <!-- End Firsr Col-12 -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->



		<!-- // Mark Entry =========== -->

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
     $.ajax({
      url: "{{ route('student.marks.getstudents')}}",
      type: "GET",
      data: {
      	'year_id':year_id,'class_id':class_id,'assign_subject_id':assign_subject_id,'exam_type_id':exam_type_id
      },
      success: function (data) {
        $('#marks-entry').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
        	var increment = key+1
          html +=
          '<tr>'+
          '<td>'+increment+'</td>'+
          // '<td><?= url('upload/student_images') ?>/'+v.student.image+'</td>'+
          '<td><img class="rounded-circle" style="width: 40px; height: 40px" src="<?= url('upload/student_images') ?>/'+v.student.image+'"></td>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"> <input type="hidden" name="id_no[]" value="'+v.student.id_no+'"> </td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
         '<td style="text-transform:capitalize">'+v.student.gender+'</td>'+ 
          '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+'"></td>'+
          '</tr>';
        });
        html = $('#marks-entry-tr').html(html);
      }
    });
  });

</script>

<!-- ============ End Script Roll Generate ================= -->




<!-- ========================-  Load class by subject ====================== -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{ route('marks.getsubject') }}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each( data, function(key, v) {
            html += '<option value="'+v.subject_id+'">'+v.name+'</option>';
            // html += '<option value="'+v.id+'">'+v.school_subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }
      });
    });
  });
</script>
<!-- ========================-End  Load class by subject ====================== -->



@endsection