@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Designation List</h3>
				  <a href="{{ route('designation.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Designation</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Name</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $designation)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $designation->name }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('designation.edit', $designation->id) }}">Edit</a> |
									<a id="delete" class="btn btn-rounded btn-md btn-danger" href="{{ route('designation.delete', $designation->id) }}">Delete</a>
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