@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Dashboard
				</h1>
													<!-- <button type="button" class="btn mb-1 btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Tindakan
													</button>
													<div class="dropdown-menu" style="">
														<a class="dropdown-item" href="/projek/1/">Cipta Lokasi</a>
														<a class="dropdown-item" href="/projek/1/">Cipta Deliverable</a>
														<a class="dropdown-item" href="/projek/1/">Cipta Invoice</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">Separated link</a>
													</div>	 -->
			</div>

            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Activity</h5>
									<h6 class="card-subtitle text-muted">-</h6>
								</div>
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Projek</th>
												<th scope="col">Nama</th>
                                                <th scope="col">Tarikh Mula</th>
                                                <th scope="col">Tarikh Akhir</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Tindakan</th>
											</tr>
										</thead>
										<tbody>

                                            @foreach ($aktivitis as $aktiviti)
                                            <tr>
												<th scope="row">{{ $aktiviti->id }}</th>
												<td>{{ $aktiviti->name }}</td>
												<td>{{ $aktiviti->email }}</td>
                                                <td>-</td>
                                                <td>-</td>
											</tr>    
                                            @endforeach                                        

										</tbody>
									</table>
								</div>
							</div>
                            
                            
                </div>


			</div>	  
            
            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Deliverable</h5>
									<h6 class="card-subtitle text-muted">-</h6>
								</div>
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Projek</th>
												<th scope="col">Nama</th>
                                                <th scope="col">Tarikh Mula</th>
                                                <th scope="col">Tarikh Akhir</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Tindakan</th>
											</tr>
										</thead>
										<tbody>

                                            @foreach ($aktivitis as $aktiviti)
                                            <tr>
												<th scope="row">{{ $aktiviti->id }}</th>
												<td>{{ $aktiviti->name }}</td>
												<td>{{ $aktiviti->email }}</td>
                                                <td>-</td>
                                                <td>-</td>
											</tr>    
                                            @endforeach                                        

										</tbody>
									</table>
								</div>
							</div>
                            
                            
                </div>


			</div>	             

			<!-- <div class="row">
				<div class="col-xl-6 col-xxl-7">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								
							</div>
							<h5 class="card-title mb-0">Gold Price</h5>
						</div>
						<div class="card-body py-3">
							<div class="chart chart-sm">
								<canvas id="chartjs-dashboard-line"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-xxl-5 d-flex">
					<div class="w-100">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Gold Portfolio</h5>
											</div>

				
										</div>
										<h1 class="display-5 mt-1 mb-3">
											{{ number_format(($user->alloted_gold + $user->unalloted_gold) / 1000000, 2, '.', ',') }}
										</h1>
										<div class="mb-0">
											
											
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Gold Savings</h5>
											</div>

											
										</div>
										<h1 class="display-5 mt-1 mb-3">
											{{ number_format($user->alloted_gold / 1000000, 2, '.', ',') }}											
										</h1>
									
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Gold Booked</h5>
											</div>

									
										</div>
										<h1 class="display-5 mt-1 mb-3">
											{{ number_format($user->enhance_gold_latest / 1000000, 2, '.', ',') }}																						
										</h1>
									
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Gold Leased</h5>
											</div>

										</div>
										<h1 class="display-5 mt-1 mb-3">
											{{ number_format($user->advance_gold_latest / 1000000, 2, '.', ',') }}																																	
										</h1>
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		 -->
			
			<!-- <div class="row">
				<div class="col-4">



							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title">Add new user</h5>
									<h6 class="card-subtitle text-muted">Promote Gold to new users</h6>
								</div>
								<div class="card-body">
									<form method="POST" action="/app/reward/register">
    									@csrf
										<input name="promoter_id" type="hidden" value="{{ auth()->user()->id }}">

										<div class="mb-3">
											<label class="form-label">Name</label>
											<input type="text" class="form-control" name="name">											
										</div>

										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" name="email">											
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" name="password">											
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input type="password" class="form-control" name="password_confirmation">											
										</div>										
										<button type="submit" class="btn btn-primary">Add New User</button>
									</form>
								</div>
							</div>						
				</div>


				<div class="col-4">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
				
	
							</div>
							<h5 class="card-title mb-0">Portfolio Allocation</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">
										<canvas id="chartjs-dashboard-pie"></canvas>
									</div>
								</div>

								<table class="table mb-0">
									<tbody>
										<tr>
											<td><i class="fas fa-circle text-primary fa-fw"></i> Gold Savings</td>
											<td class="text-end">{{ number_format($user->alloted_gold / 1000000, 2, '.', ',') }} g</td>
										</tr>
										<tr>
											<td><i class="fas fa-circle text-warning fa-fw"></i> Gold Advance</td>
											<td class="text-end">{{ number_format($user->advance_gold_latest / 1000000, 2, '.', ',') }} g</td>
										</tr>
										<tr>
											<td><i class="fas fa-circle text-danger fa-fw"></i> Gold Enhance</td>
											<td class="text-end">{{ number_format($user->advance_gold_latest / 1000000, 2, '.', ',') }} g</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			
		</div>

		<!-- <div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Welcome back, Linda!
				</h1>
				<p class="header-subtitle">You have 24 new messages and 5 new notifications.</p>
			</div>

			<div class="row">
				<div class="col-xl-6 col-xxl-7">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Recent Movement</h5>
						</div>
						<div class="card-body py-3">
							<div class="chart chart-sm">
								<canvas id="chartjs-dashboard-line"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-xxl-5 d-flex">
					<div class="w-100">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Sales Today</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="truck"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-1 mb-3">2.562</h1>
										<div class="mb-0">
											<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.65% </span>
											Less sales than usual
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Visitors Today</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="users"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-1 mb-3">17.212</h1>
										<div class="mb-0">
											<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.50% </span>
											More visitors than usual
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Total Earnings</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="dollar-sign"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-1 mb-3">$24.300</h1>
										<div class="mb-0">
											<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
											More earnings than usual
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0">
												<h5 class="card-title">Pending Orders</h5>
											</div>

											<div class="col-auto">
												<div class="avatar">
													<div class="avatar-title rounded-circle bg-primary-dark">
														<i class="align-middle" data-feather="shopping-cart"></i>
													</div>
												</div>
											</div>
										</div>
										<h1 class="display-5 mt-1 mb-3">43</h1>
										<div class="mb-0">
											<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
											Less orders than usual
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
					<div class="card flex-fill">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Calendar</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="chart">
									<div id="datetimepicker-dashboard"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Current Visitors</h5>
						</div>
						<div class="card-body px-4">
							<div id="world_map" style="height:350px;"></div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Browser Usage</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<div class="py-3">
									<div class="chart chart-xs">
										<canvas id="chartjs-dashboard-pie"></canvas>
									</div>
								</div>

								<table class="table mb-0">
									<tbody>
										<tr>
											<td><i class="fas fa-circle text-primary fa-fw"></i> Chrome</td>
											<td class="text-end">4401</td>
										</tr>
										<tr>
											<td><i class="fas fa-circle text-warning fa-fw"></i> Firefox</td>
											<td class="text-end">4003</td>
										</tr>
										<tr>
											<td><i class="fas fa-circle text-danger fa-fw"></i> IE</td>
											<td class="text-end">1589</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-lg-8 col-xxl-9 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Latest Projects</h5>
						</div>
						<table id="datatables-dashboard-projects" class="table table-striped my-0">
							<thead>
								<tr>
									<th>Name</th>
									<th class="d-none d-xl-table-cell">Start Date</th>
									<th class="d-none d-xl-table-cell">End Date</th>
									<th>Status</th>
									<th class="d-none d-md-table-cell">Assignee</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Project Apollo</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Carl Jenkins</td>
								</tr>
								<tr>
									<td>Project Fireball</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-danger">Cancelled</span></td>
									<td class="d-none d-md-table-cell">Bertha Martin</td>
								</tr>
								<tr>
									<td>Project Hades</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Stacie Hall</td>
								</tr>
								<tr>
									<td>Project Nitro</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-warning">In progress</span></td>
									<td class="d-none d-md-table-cell">Carl Jenkins</td>
								</tr>
								<tr>
									<td>Project Phoenix</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Bertha Martin</td>
								</tr>
								<tr>
									<td>Project X</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Stacie Hall</td>
								</tr>
								<tr>
									<td>Project Romeo</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-success">Done</span></td>
									<td class="d-none d-md-table-cell">Ashley Briggs</td>
								</tr>
								<tr>
									<td>Project Wombat</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-warning">In progress</span></td>
									<td class="d-none d-md-table-cell">Bertha Martin</td>
								</tr>
								<tr>
									<td>Project Zircon</td>
									<td class="d-none d-xl-table-cell">01/01/2021</td>
									<td class="d-none d-xl-table-cell">31/06/2021</td>
									<td><span class="badge bg-danger">Cancelled</span></td>
									<td class="d-none d-md-table-cell">Stacie Hall</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-xxl-3 d-flex">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								<a href="#" class="me-1">
									<i class="align-middle" data-feather="refresh-cw"></i>
								</a>
								<div class="d-inline-block dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
										<i class="align-middle" data-feather="more-vertical"></i>
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Monthly Sales</h5>
						</div>
						<div class="card-body d-flex w-100">
							<div class="align-self-center chart chart-lg">
								<canvas id="chartjs-dashboard-bar"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div> -->

	</main>

@endsection	

@section('script')


@endsection