@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Organisasi
				</h1>
				<p class="header-subtitle">- - -</p>
			</div>

			<div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Organisasi</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>

								<div class="card-body py-3">

									<table class="table table-striped table-sm organisasi-datatable">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Simbol</th>
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

    var table = $('.organisasi-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/organisasi",
        columns: [
			//{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'nama', name: 'nama'},
            {data: 'simbol', name: 'simbol'},
			{data: 'link', name: 'link'},
        ]
    });

  });
</script>

@endsection