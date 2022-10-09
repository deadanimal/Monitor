@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Pengguna
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

                            <form action="/pengguna" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="name">
                                </div>         
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" name="email">
                                </div>   
                                <div class="mb-3">
                                    <label class="form-label">Organisasi</label>
                                    <select class="form-control mb-3" name="organisasi_id">
                                        @foreach ($organisasis as $organisasi)
										    <option value="{{ $organisasi->id }}">{{ $organisasi->nama }}</option>
                                        @endforeach     
									</select>                                    
                                </div>                                 
                                <div class="mb-3">
                                    <label class="form-label">Peranan</label>
                                    <select class="form-control mb-3" name="role_id">
                                        @foreach ($roles as $role)
										    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                        @endforeach 
									</select> 
                                </div>                                    
                                <button type="submit" class="btn btn-primary">Cipta</button>
                            </form>

						</div>
					</div>
				</div>

            </div>

            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Pengguna</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>

								<div class="card-body">
									<table class="table table-bordered pengguna-datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Email</th>
													<th>Organisasi</th>
													<th>Peranan</th>
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
        ajax: "{{ route('pengguna.senarai') }}",
        columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'name', name: 'nama'},
            {data: 'email', name: 'email'},
			{data: 'organisasi', name: 'organisasi'},
			{data: 'role', name: 'role'},
        ]
    });

  });
</script>

@endsection