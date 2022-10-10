@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
                     {{$projek->nama}} <br/>
				</h1>
													<!-- <button type="button" class="btn mb-1 btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
													</div>		 -->
			</div>

            <div class="row">
                <div class="col-xl-6">
                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Maklumat</h5>
										</div>
										<div class="card-body">

                                        Nama: {{$projek->nama}} <br/>
                                        Organisasi: {{$projek->organisasi->nama}} <br/>

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
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#aktiviti" role="tab">
										Aktiviti
									</a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#deliverable" role="tab">
										Hasil
									</a>  
                                    <!-- @role(['client-finance','client-pmo','client-end-user','admin','pmo','finance'])
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#invoice" role="tab">
										Inbois
									</a>
                                    @endrole -->
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#dokumen" role="tab">
										Dokumen
									</a>                                                                       
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#nota" role="tab">
										Nota
									</a>                                        
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#perubahan" role="tab">
										Perubahan
									</a>                                                                          
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#ralat" role="tab">
										Ralat
									</a>  
									<!--      
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#masalah" role="tab">
										Masalah
									</a>                                                                                                                                          -->

								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">





								<div class="tab-pane fade active show" id="aktiviti" role="tabpanel">

									<table class="table table-striped table-sm activity-datatable mb-5">
											<thead>
												<tr>
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




								<div class="tab-pane fade active" id="deliverable" role="tabpanel">


									<table class="table table-striped table-sm deliverable-datatable mb-5">
											<thead>
												<tr>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Tarikh</th>
                                                    <th>Pelaksana</th>
                                                    <th>-</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
									    </table>	
                                    
									<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Cipta Hasil</h5>
										</div>
										<div class="card-body">

                                        <form action='/projek/{{ $projek->id}}/deliverable' method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Hasil">
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





								<div class="tab-pane fade" id="invoice" role="tabpanel">

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Inbois</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>

								</div>





								<div class="tab-pane fade active" id="dokumen" role="tabpanel">


									<table class="table table-striped table-sm dokumen-datatable">
											<thead>
												<tr>
													<th>Tarikh</th>
													<th>Nama</th>
													<th>Versi</th>
                                                    <th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
									    </table>								

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Dokumen</h5>
										</div>
										<div class="card-body">                                

											<form action="/projek/{{$projek->id}}/dokumen" enctype="multipart/form-data" method="POST">
												@csrf
												<div class="form-group mb-3">
													<input type="file" name="upload" id="upload">
												</div>
												<div class="form-group mb-3">
													<label for="title">Nama</label>
													<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Dokumen" required>

												</div>
												<button class="btn btn-primary">Upload</button>
											</form>    										


										</div>
									</div>

								</div>   
                                
                             
								




								<div class="tab-pane fade active" id="nota" role="tabpanel">

								<table class="table table-striped table-sm nota-datatable">
											<thead>
												<tr>
													<th>Tarikh</th>
													<th>Nama</th>
                                                    <th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
									    </table>								

									<div class="row">


										<div class="col-xl-12">

												<div class="card">
														<div class="card-header">
															<h5 class="card-title">Output</h5>                                 
														</div>

														<div class="card-body" id="html-output">
															
														</div>

														
												</div>
													
													
										</div>

										<div class="col-xl-12">

											<div class="card">


													<div class="card-body">

														<form action="/projek/{{$projek->id}}/nota" method="POST">
															@csrf

															<div class="mb-3">
																<label class="form-label">Nama</label>
																<input class="form-control" type="text" name="nama">
															</div>                           

															<div class="row">
																<div class="col">
																	<div class="textwrapper">
																		<textarea id="markdown-input" 
																			name="deskripsi"
																			class="form-control mb-3"
																			cols="2" 
																			rows="10" 
																			id="rules" 
																			onkeyup="scriptRan()"
																			style="width:100%;"></textarea>
																	</div>                                            
																</div>
															</div>	
															
															<button class="btn btn-primary">Simpan</button>
														</form>
													</div>

														
											</div>
																				
										</div>                    											


									</div>									

								</div> 
                                
                                



								<div class="tab-pane fade" id="perubahan" role="tabpanel">


								<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Cipta Perubahan</h5>
										</div>
										<div class="card-body">

                                        <form action='/projek/{{ $projek->id}}/perubahan' method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Hasil">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label>Kategori</label>
                                                    <select class="form-control mb-3" id="kategori" name="kategori">
                                                        <option value="DOKUMEN">Dokumen</option>
                                                        <option value="SISTEM">Aplikasi & Sistem</option>
                                                        <option value="LAIN">Lain-lain</option>
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





								<div class="tab-pane fade" id="ralat" role="tabpanel">

                                    <div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Ralat</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>

								</div>        
                                
                                



                                <div class="tab-pane fade" id="masalah" role="tabpanel">

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Masalah</h5>
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
            {data: 'nama', name: 'nama'},
            {data: 'kategori', name: 'kategori'},
            {data: 'status', name: 'status'},
            {data: 'tarikh_rancang', name: 'tarikh_rancang'},
            {data: 'pelaksana', name: 'pelaksana'},
        ]
    });


  });
</script>

<script type="text/javascript">
  $(function () {

    var table = $('.deliverable-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/projek/{{$projek->id}}/deliverable",
        columns: [	
            {data: 'nama', name: 'nama'},
            {data: 'kategori', name: 'kategori'},
            {data: 'status', name: 'status'},
            {data: 'tarikh_rancang', name: 'tarikh_rancang'},
            {data: 'pelaksana', name: 'pelaksana'},
            {data: 'nama', name: 'nama'},
        ]
    });


  });
</script>

<script type="text/javascript">
  $(function () {

    var table = $('.dokumen-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/projek/{{$projek->id}}/dokumen",
        columns: [
			{data: 'created_at', name: 'created_at'},			
            {data: 'nama', name: 'nama'},
			{data: 'nama', name: 'versi'},
            {data: 'link', name: 'link'},
        ]
    });


  });
</script>

<script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
<script type="text/javascript">



    function scriptRan() {
        var converter = new showdown.Converter(),
            text      = document.getElementById("markdown-input").value,
            html      = converter.makeHtml(text);
        document.getElementById('html-output').innerHTML = html;
    }

</script>

<script type="text/javascript">
  $(function () {

    var table = $('.nota-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "/projek/{{$projek->id}}/nota",
        columns: [
			{data: 'created_at', name: 'created_at'},			
            {data: 'nama', name: 'nama'},
            {data: 'link', name: 'link'},
        ]
    });


  });
</script>


@endsection