@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Projek
				</h1>
													<button type="button" class="btn mb-1 btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Tindakan
													</button>
													<div class="dropdown-menu" style="">
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/">Cipta Aktiviti</a>
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/">Cipta Deliverable</a>
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/">Cipta Invoice</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">Separated link</a>
													</div>		
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
												<th scope="col">Nama</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
											</tr>
										</thead>
										<tbody>

                                            @foreach ($aktivitis as $aktiviti)
                                            <tr>
												<th scope="row">{{ $aktiviti->id }}</th>
												<td>{{ $aktiviti->name }}</td>
												<td>{{ $aktiviti->status }}</td>
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
												<th scope="col">Nama</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
											</tr>
										</thead>
										<tbody>

                                            @foreach ($aktivitis as $aktiviti)
                                            <tr>
												<th scope="row">{{ $aktiviti->id }}</th>
												<td>{{ $aktiviti->name }}</td>
												<td>{{ $aktiviti->status }}</td>
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
												<th scope="col">Nama</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
											</tr>
										</thead>
										<tbody>

                                            @foreach ($aktivitis as $aktiviti)
                                            <tr>
												<th scope="row">{{ $aktiviti->id }}</th>
												<td>{{ $aktiviti->name }}</td>
												<td>{{ $aktiviti->status }}</td>
                                                <td>-</td>
											</tr>    
                                            @endforeach                                        

										</tbody>
									</table>
								</div>
							</div>
                            
                            
                </div>


			</div>	             



			

			
		</div>



	</main>

@endsection	

@section('script')


@endsection