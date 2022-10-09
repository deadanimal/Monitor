@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Dashboard
				</h1>
				<p class="header-subtitle"><b>{{ auth()->user()->name }}</b> (@foreach (auth()->user()->roles as $role){{ $role->display_name }}@endforeach)</p>
			</div>

			<div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Aktiviti</h5>
								</div>

								

									<table class="table table-striped table-sm">
										<thead>
											<tr>
													<th>No</th>
													<th>Pelanggan</th>
													<th>Projek</th>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Tarikh</th>
                                                    <th></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($acts as $act)
											<tr>
													<td>{{$act->id}}</td>
													<td>{{$act->organisasi->simbol}}</td>
													<td>{{$act->projek->nama}}</td>
													<td>{{$act->nama}}</td>
                                                    <td>{{$act->kategori}}</td>
                                                    <td>{{$act->status}}</td>
                                                    <td>{{$act->tarikh_rancang}}</td>
                                                    <td>
														<a href="/projek/{{$act->projek->id}}/activity/{{ $act->id }}"><button class="btn btn-primary">Lihat</button></a>
													</td>
											</tr>
											@endforeach
											
										</tbody>
									</table>	
											
												
								
							</div>
                            
                            
                </div>


			</div>		

			<div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Hasil</h5>
								</div>

								

									<table class="table table-striped table-sm">
										<thead>
											<tr>
													<th>No</th>
													<th>Pelanggan</th>
													<th>Projek</th>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Tarikh</th>
                                                    <th></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($delis as $deli)
											<tr>
													<td>{{$deli->id}}</td>
													<td>{{$deli->organisasi->simbol}}</td>
													<td>{{$deli->projek->nama}}</td>
													<td>{{$deli->nama}}</td>
                                                    <td>{{$deli->kategori}}</td>
                                                    <td>{{$deli->status}}</td>
                                                    <td>{{$deli->tarikh_rancang}}</td>
                                                    <td>
														<a href="/projek/{{$deli->projek->id}}/deliverable/{{ $deli->id }}"><button class="btn btn-primary">Lihat</button></a>													
													</td>
											</tr>
											@endforeach
											
										</tbody>
									</table>	
											
												
								
							</div>
                            
                            
                </div>


			</div>					
			

			
		</div>



	</main>

@endsection	

@section('script')


@endsection