@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Pengguna
				</h1>
			</div>

            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Pengguna</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>

								<div class="card-body">
									<table class="table table-striped table-sm pengguna-datatable">
											<thead>
												<tr>
													<th>Nama</th>
													<th>Email</th>
													<th>Organisasi</th>
													<th>Peranan</th>
													<th>-</th>
												</tr>
											</thead>
											<tbody>
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

<script type="text/javascript">
  $(function () {

    var table = $('.pengguna-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/pengguna",
        columns: [
			//{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'name', name: 'nama'},
            {data: 'email', name: 'email'},
			{data: 'organisasi', name: 'organisasi'},
			{data: 'role', name: 'role'},
			{data: 'link', name: 'link'},
        ]
    });

  });
</script>

@endsection