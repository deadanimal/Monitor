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

				<div class="col-xl-5">
					<div class="card flex-fill w-100">
						<div class="card-header">
							<div class="card-actions float-end">
								
							</div>
							<h5 class="card-title mb-0">---</h5>
						</div>
						<div class="card-body py-3">

                            <form action="/organisasi" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                </div>         
                                <div class="mb-3">
                                    <label class="form-label">Simbol</label>
                                    <input class="form-control" type="text" name="simbol">
                                </div>                                                      
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

						</div>
					</div>
				</div>

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Organisasi</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>

								<div class="card-body py-3">

									<table class="table table-bordered organisasi-datatable">
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

    var table = $('.organisasi-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('organisasi.senarai') }}",
        columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'nama', name: 'nama'},
            {data: 'simbol', name: 'simbol'},
        ]
    });

  });
</script>

@endsection