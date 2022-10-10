@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Profil
				</h1>
			</div>

			<div class="row">

				<div class="col-xl-4">



					<div class="card flex-fill w-100">
						<!-- <div class="card-header">
							<div class="card-actions float-end">
								
							</div>
							<h5 class="card-title mb-0">---</h5>
						</div> -->
						<div class="card-body py-3">

						<b>Nama:</b> {{$user->name}} <br>
						<b>Email:</b> {{$user->email}} <br>
						<b>Organisasi:</b> {{$user->organisasi->nama}} <br>
						<b>Gaji Harian:</b> RM {{ number_format($user->day_rate/100, 2, '.', ',') }} <br>

         

						</div>
					</div>



					<div class="card flex-fill w-100">
						<div class="card-header">
					
							<h5 class="card-title mb-0">Ubah Kata Laluan</h5>
						</div>
						<div class="card-body py-3">


                            <form action="/profil/ubah-password" method="POST">
                                @csrf       
                                <div class="mb-3">
                                    <label class="form-label">Kata Laluan</label>
                                    <input class="form-control" type="password" name="password">
                                </div>                                                                      
                                <button type="submit" class="btn btn-primary">Ubah Kata Laluan</button>
                            </form>

						</div>
					</div>	
				
					
					
				</div>

			

            </div>





            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Lokasi</h5>
									
								</div>

									<div class="card-body">
									<table class="table table-striped table-sm lokasi-datatable">
											<thead>
												<tr>
													<th>Masa</th>													
													<th>Lokasi</th>
													<th>Latitude</th>
													<th>Longitude</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
									    </table>	
									</div>																	
								
							</div>
                            
                            
                </div>


			</div>	
			

			<!--


			
            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Log</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>
								
							</div>
                            
                            
                </div>


			</div>				 -->
			

			
		</div>



	</main>

@endsection	

@section('script')

<script type="text/javascript">
  $(function () {

    var table = $('.lokasi-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/pengguna/{{$user->id}}/lokasi",
        columns: [	
			{data: 'created_at', name: 'created_at'},
            {data: 'lokasi', name: 'lokasi'},
            {data: 'lat', name: 'lat'},
            {data: 'lng', name: 'lng'},            
        ]
    });


  });
</script>

@endsection