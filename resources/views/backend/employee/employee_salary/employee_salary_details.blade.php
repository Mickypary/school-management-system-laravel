@extends('admin.admin_master')
@section('admin')


<section class="content">
      <div class="row">

        <div class="col-12">

       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Employee Salary Details for </h3>
          <br><br>
          <h5><strong>Employee Name: </strong>{{ $details->name}}</h5>
          <h5><strong>Employee ID: </strong>{{ $details->id_no}}</h5>
          <h5><strong>Join Date: </strong>{{ $details->join_date}}</h5>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">Sl</th>
                <th>Previous Salary</th>
                <th>Increment Salary</th>
                <th>Present Salary</th>
                <th>Effected Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($salary_log as $key => $value)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->previous_salary }}</td>
                <td>{{ $value->increment_salary }}</td>
                <td>{{ $value->present_salary }}</td>
                <td>{{ date('Y-m-d', strtotime($value->effected_salary_date)) }}</td>
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