@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Leave</h3>
				  <a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Leave</a>
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
								<th>Purpose</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $leave)
							<tr>
								<td>{{ $key+1 }}</td>
								<td ><img class="rounded-circle" src="{{ url('upload/employee_images/'.$leave['user']->image)}}" width="40" height="40"></td>
								<td>{{ $leave['user']->name }}</td>
								<td>{{ $leave['user']->id_no }}</td>
								<td>{{ $leave['purpose']->name }}</td>
								<td>{{ $leave->start_date }}</td>
								<td>{{ $leave->end_date }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('employee.leave.edit', $leave->id) }}">Edit</a> |
									<a id="delete" class="btn btn-rounded btn-md btn-danger" href="{{ route('employee.leave.delete', $leave->id) }}">Delete</a>
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