@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee List</h3>
				  <a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Employee</a>
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
								<th>Mobile</th>
								<th>Gender</th>
								<th>Join Date</th>
								<th>Salary</th>
								@if(Auth::user()->role == 'Admin' )
								<th>Code</th>
								@endif
								<th width="17%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $employee)
							<tr>
								<td>{{ $key+1 }}</td>
								<td ><img class="rounded-circle" src="{{ url('upload/employee_images/'.$employee->image)}}" width="40" height="40"></td>
								<td>{{ $employee->name }}</td>
								<td>{{ $employee->id_no }}</td>
								<td>{{ $employee->mobile }}</td>
								<td>{{ ucfirst($employee->gender) }}</td>
								<td>{{ $employee->join_date }}</td>
								<td>{{ $employee->salary }}</td>
								@if(Auth::user()->role == 'Admin' )
								<td>{{ $employee->code }}</td>
								@endif
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('employee.reg.edit', $employee->id) }}">Edit</a> |
									<a id="" target="_blank"  class="btn btn-rounded btn-md btn-primary" href="{{ route('employee.reg.details', $employee->id) }}">Details</a>
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