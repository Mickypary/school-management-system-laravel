@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Attendance List</h3>
				  <a href="{{ route('employee.attendance.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Attendance</a>
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
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td ><img class="rounded-circle" src="{{ url('upload/employee_images/'.$value['user']->image)}}" width="40" height="40"></td>
								<td>{{ $value['user']->name }}</td>
								<td>{{ $value['user']->id_no }}</td>
								<td>{{ $value->date }}</td>
								<td>{{ $value->attendance_status }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('employee.leave.edit', $value->id) }}">Edit</a> |
									<a id="delete" class="btn btn-rounded btn-md btn-danger" href="{{ route('employee.leave.delete', $value->id) }}">Delete</a>
								</td>
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