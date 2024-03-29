@extends('admin.admin_master')

<!-- Title section -->
@section('title', 'Employee Attendance')



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
								<th>Date</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('employee.attendance.edit', $value->date) }}">Edit</a> |
									<a id="" class="btn btn-rounded btn-md btn-primary" href="{{ route('employee.attendance.details', $value->date) }}">Details</a>
									<a id="delete" class="btn btn-rounded btn-md btn-danger" href="{{ route('employee.attendance.delete', $value->date) }}">Delete</a>
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