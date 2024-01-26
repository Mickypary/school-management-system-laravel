@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employee Salary List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Name</th>
								<th>ID No.</th>
								<th>Mobile</th>
								<th>Gender</th>
								<th>Join Date</th>
								<th>Salary</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->id_no }}</td>
								<td>{{ $value->mobile }}</td>
								<td>{{ ucfirst($value->gender) }}</td>
								<td>{{ date('d-m-Y', strtotime($value->join_date)) }}</td>
								<td>{{ $value->salary }}</td>
								<td>
									<a title="Increment" class="btn btn-md btn-info" href="{{ route('employee.salary.increment', $value->id) }}"><i class="fa fa-plus-circle"></i></a> |
									<a title="Details" id="" target="_blank"  class="btn btn-md btn-primary" href="{{ route('employee.salary.details', $value->id) }}"><i class="fa fa-eye"></i></a>
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