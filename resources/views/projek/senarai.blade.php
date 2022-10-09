@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Projek
				</h1>
				<p class="header-subtitle">- - -</p>
			</div>


			<div class="row">

                <div class="col-xl-12">

                	<div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Projek</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>


								<div class="card-body">
									<table class="table table-bordered projek-datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Organisasi</th>
													<th>Nama</th>
													<th></th>
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

    var table = $('.projek-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('projek.senarai') }}",
        columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
			{data: 'organisasi', name: 'organisasi'},
            {data: 'nama', name: 'nama'},
			{data: 'link', name: 'link'},
        ]
    });

  });
</script>

@endsection