@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Grade Marks List</h3>
				  <a href="{{ route('marks.grade.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Grade Mark</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Grade Name</th>
								<th>Grade Point</th>
								<th>Start Mark</th>
								<th>End Mark</th>
								<th>Point Range</th>
								<th>Remarks</th>
								<th width="20%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $value->grade_name }}</td>
								<td>{{ $value->grade_point }}</td>
								<td>{{ $value->start_mark }}</td>
								<td>{{ $value->end_mark }}</td>
								<td>{{ $value->start_point }} - {{ $value->end_point }}</td>
								<td>{{ $value->remarks }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('marks.grade.edit', $value->id) }}">Edit</a> |
									<a id="delete" class="btn btn-rounded btn-md btn-danger" href="{{ route('marks.grade.delete', $value->id) }}">Delete</a> |
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