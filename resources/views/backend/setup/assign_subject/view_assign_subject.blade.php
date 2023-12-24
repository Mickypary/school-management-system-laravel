@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Assign Subject List</h3>
				  <a href="{{ route('assign.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success">Assign Subject</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Class Name</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $assign)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $assign['student_class']['name'] }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('assign.subject.edit', $assign->class_id)}}">Edit</a> |
									<a class="btn btn-rounded btn-md btn-primary" href="{{ route('assign.subject.details', $assign->class_id)}}">Details</a>
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