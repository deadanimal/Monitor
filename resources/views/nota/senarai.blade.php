@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Nota
				</h1>
				<!-- <p class="header-subtitle">- - -</p> -->
														
			</div>

			<div class="row">


                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Nota</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>

								<div class="card-body py-3">

									<table class="table table-striped table-sm nota-datatable">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Simbol</th>
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

    var table = $('.nota-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/nota",
        columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'nama', name: 'nama'},
            {data: 'simbol', name: 'simbol'},
        ]
    });

  });
</script>

@endsection