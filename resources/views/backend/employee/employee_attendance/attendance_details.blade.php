@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Attendance Details</h3><br>
				  <h4 class="box-title">Attendance for {{ date('d-m-Y', strtotime($detailsData[0]->date)) }}</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Photo</th>
								<th>Name</th>
								<th>ID No.</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detailsData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td ><img class="rounded-circle" src="{{ url('upload/employee_images/'.$value['user']->image)}}" width="40" height="40"></td>
								<td>{{ $value['user']->name }}</td>
								<td>{{ $value['user']->id_no }}</td>
								<td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
								<td>{{ $value->attendance_status }}</td>
							</tr>
							@endforeach

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
         
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->



@endsection