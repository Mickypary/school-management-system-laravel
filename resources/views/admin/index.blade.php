@extends('admin.admin_master')
@section('admin')

@php

	$total_student = App\Models\User::where('usertype','Student')->get();
	$total_employee = App\Models\User::where('usertype','Employee')->get();
	$total_admin = App\Models\User::where('usertype','Admin')->get();
	$total_users = App\Models\User::all();

	//counts
	$studentcount = count($total_student);
	$employeecount = count($total_employee);
	$admincount = count($total_admin);
	$usercount = count($total_users);


	$lateststudent = App\Models\User::where('usertype','Student')->latest()->take(5)->get();


@endphp


<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-primary-light rounded w-60 h-60">
								<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Students</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $studentcount }}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-warning-light rounded w-60 h-60">
								<i class="text-warning mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Employees</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $employeecount }}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-info-light rounded w-60 h-60">
								<i class="text-info mr-0 font-size-24 mdi mdi-account-multiple"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Admin</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $admincount }}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon bg-danger-light rounded w-60 h-60">
								<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">Total Users</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $usercount }}</h3>
							</div>
						</div>
					</div>
				</div>

				
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title align-items-start flex-column">
								New Students
								<small class="subtitle">More than 400+ new members</small>
							</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-border">
									<thead>
										<tr class="text-uppercase bg-lightest">
											<th style="min-width: 150px"><span class="text-fade">Image</span></th>
											<th style="min-width: 250px"><span class="text-white">Student Name</span></th>
											<th style="min-width: 100px"><span class="text-fade">Class</span></th>
											<th style="min-width: 100px"><span class="text-fade">Date Joined</span></th>
											<th style="min-width: 150px"><span class="text-fade">Gender</span></th>
											<th style="min-width: 130px"><span class="text-fade">status</span></th>

											<!-- <th style="min-width: 120px"></th> -->
										</tr>
									</thead>
									<tbody>
										@foreach($lateststudent as $key => $student)
										<tr>
										<td><img src="{{ (!empty($student->image) ? url('upload/student_images/'.$student->image) : url('upload/no_image.jpg')) }}" style="width: 50px; height: 50px;"></td>										
											<td class="pl-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 mr-20">
														<div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-1.jpg)"></div>
													</div>

													<div>
														<a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">{{ $student->name }} {{ $student->fname }}</a>
													</div>
												</div>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													Paid
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $student->join_date }}
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ ucfirst($student->gender) }}
												</span>
											</td>
											<td>
												<span class="badge badge-primary-light badge-lg">Approved</span>
											</td>
											
										</tr>
										@endforeach
										
										
										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>  
				</div>
			</div>
		</section>




@endsection