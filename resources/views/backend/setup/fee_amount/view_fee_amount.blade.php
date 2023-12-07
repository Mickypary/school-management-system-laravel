@extends('admin.admin_master')
@section('admin')


<section class="content">
		  <div class="row">

		  	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student Fee Amount List</h3>
				  <a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th>
								<th>Fee Category</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $amount)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $amount['fee_category']['name'] }}</td>
								<td>
									<a class="btn btn-rounded btn-md btn-info" href="{{ route('fee.amount.edit', $amount->fee_category_id)}}">Edit</a> |
									<a id="delete" class="btn btn-rounded btn-md btn-danger" href="">Delete</a>
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