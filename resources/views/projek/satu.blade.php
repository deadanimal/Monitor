@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
                    {{$projek->organisasi->nama}} - {{$projek->nama}} <br/>
				</h1>
													<button type="button" class="btn mb-1 btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Tindakan
													</button>
													<div class="dropdown-menu" style="">

                                                        @role(['admin','pmo','finance'])
														    <a class="dropdown-item" href="/projek/{{ $projek->id }}/activity/cipta">Cipta Aktiviti</a>
														    <a class="dropdown-item" href="/projek/{{ $projek->id }}/deliverable/cipta">Cipta Hasil</a>
														    <a class="dropdown-item" href="/projek/{{ $projek->id }}/invoice/cipta">Cipta Inbois</a>
                                                            <div class="dropdown-divider"></div>
                                                        @endrole

                                                        @role(['admin','client-finance','client-pmo','client-end-user','analyst', 'developer'])
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/dokumen/muatnaik">Muatnaik Dokumen</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/nota/cipta">Cipta Nota</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/perubahan/cipta">Cipta Perubahan</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/ralat/cipta">Cipta Ralat</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/masalah/cipta">Cipta Masalah</a>
                                                        @endrole
													</div>		
			</div>

            <div class="row">
                <div class="col-xl-4">
                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Maklumat</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>	                    
                </div>
                <div class="col-xl-8">
                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Kalendar</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>	                    
                </div>                
            </div>

            <div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Perkara Berkaitan</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#aktiviti" role="tab" aria-selected="true">
										Aktiviti
									</a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#deliverable" role="tab" aria-selected="false">
										Hasil
									</a>  
                                    @role(['client-finance','client-pmo','client-end-user','admin','pmo','finance'])
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#invoice" role="tab" aria-selected="false">
										Inbois
									</a>
                                    @endrole
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#dokumen" role="tab" aria-selected="false">
										Dokumen
									</a>                                                                       
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#nota" role="tab" aria-selected="false">
										Nota
									</a>                                        
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#perubahan" role="tab" aria-selected="false">
										Perubahan
									</a>                                                                          
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#ralat" role="tab" aria-selected="false">
										Ralat
									</a>        
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#masalah" role="tab" aria-selected="false">
										Masalah
									</a>                                                                                                                                         

								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">





								<div class="tab-pane fade active show" id="aktiviti" role="tabpanel">

									<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Aktiviti</h5>
										</div>
										<div class="card-body">

                                        <table class="table table-bordered activity-datatable">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Tarikh</th>
                                                    <th>Pelaksana</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
									</table>	                                        

										</div>
									</div>		
                                    
									<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Cipta Aktiviti</h5>
										</div>
										<div class="card-body">

                                        <form action='/projek/{{ $projek->id}}/activity' method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Aktiviti">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Kategori</label>
                                                    <select class="form-control mb-3" id="kategori" name="kategori">
                                                        <option value="ANALISA">Analisa</option>
                                                        <option value="PEMBANGUNAN">Pembangunan</option>
                                                        <option value="PENGUJIAN">Pengujian</option>
                                                        <option value="LATIHAN">Latihan</option>
                                                        <option value="PENTADBIRAN">Pentadbiran</option>
                                                        <option value="LAIN">Lain-lain</option>
                                                    </select>                                                       
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Tarikh</label>

                                                    <!-- <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
													    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker-date">
													    <div class="input-group-text" data-target="#datetimepicker-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
												    </div>                                                     -->
                                                    <input type="date" class="form-control" id="tarikh_rancang" name="tarikh_rancang">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Pelaksana</label>

                                                    <select class="form-control mb-3" id="pekerja_id" name="pekerja_id">
                                                        @foreach ($pipers as $piper)
                                                            <option value="{{ $piper->id }}">{{ $piper->name }} </option>
                                                        @endforeach     
                                                    </select>                                                       
                                                </div>   
                                                
                                                <div class="mb-3 col-md-12">
                                                    <label>Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deksripsi untuk aktiviti" rows="3"></textarea>
                                                </div>                                                   
                                                
                                                
                                            </div>    
                                        
                                            <button type="submit" class="btn btn-primary">Cipta</button>

                                        </form>
                                        

										</div>
									</div>	                                    

								</div>




								<div class="tab-pane fade" id="deliverable" role="tabpanel">

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Hasil</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>

								</div>





								<div class="tab-pane fade" id="invoice" role="tabpanel">

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Inbois</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>

								</div>





								<div class="tab-pane fade" id="dokumen" role="tabpanel">

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Dokumen</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>

								</div>   
                                
                                



								<div class="tab-pane fade" id="nota" role="tabpanel">

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Nota</h5>
										</div>
										<div class="card-body">

                                        

										</div>
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

    var table = $('.activity-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/projek/{{$projek->id}}/activity",
        columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},			
            {data: 'nama', name: 'nama'},
            {data: 'kategori', name: 'kategori'},
            {data: 'status', name: 'status'},
            {data: 'tarikh_rancang', name: 'tarikh_rancang'},
            {data: 'pelaksana', name: 'pelaksana'},
        ]
    });

  });
</script>


@endsection