@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Rujukan
				</h1>
				<p class="header-subtitle"></p>
			</div>

            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Rujukan</h5>
                                    @role('admin')
									    <a href="/rujukan/cipta"><h6 class="card-subtitle text-muted">Cipta rujukan</h6></a>
                                    @endrole
								</div>

								<div class="card-body">
									<table class="table table-striped table-sm rujukan-datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Kategori</th>
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

    var table = $('.rujukan-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/rujukan",
        columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'kategori', name: 'kategori'},
			{data: 'nama', name: 'nama'},
			{data: 'link', name: 'link'},
        ]
    });

  });
</script>

@endsection