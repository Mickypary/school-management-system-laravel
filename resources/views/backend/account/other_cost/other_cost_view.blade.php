@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Other Cost List</h3>
				  <a href="{{ route('other.cost.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Other Cost</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Description</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $value)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
								<td>{{ $value->amount }}</td>
								<td>{{ $value->description }}</td>
								<td><img src="{{ (!empty($value->image) ? url('upload/cost_images/'.$value->image) : url('upload/no_image.jpg'))  }}" style="width: 70px; height: 50px;"></td>
								<td>
									<a href="{{ route('edit.other.cost',$value->id) }}" class="btn btn-info">Edit</a> |
									<a id="delete" href="{{ route('delete.other.cost',$value->id) }}" class="btn btn-danger">Delete</a>
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