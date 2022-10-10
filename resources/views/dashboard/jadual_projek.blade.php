@extends('layouts.app')
 
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
@endsection
 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
                <h1 class="header-title">
					Jadual  {{$projek->organisasi->simbol}} ({{$projek->nama}})
				</h1>
			</div>


            <div class="row col">

                <div class="container mt-5" style="max-width: 700px">
                    <div id='full_calendar_events'></div>
                </div>

            </div>
            
            
			<div class="row">

				<div class="col-xl-3">
					<div class="card">
						<div class="card-body">
													<label>Projek</label>
													<select class="form-control mb-3" id="projekId" name="projekId" onchange="changeProjek()">
														@foreach($projeks as $pipe)
                                                        	<option value="{{$pipe->id}}">{{$pipe->organisasi->simbol}} {{$pipe->nama}}</option>
														@endforeach
                                                    </select> 	
						</div>													
					</div>
				</div>            

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Aktiviti</h5>
								</div>

								<div class="card-body">
									
								

									<table class="table table-striped table-sm activity-datatable">
										<thead>
											<tr>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Pelaksana</th>
                                                    <th>Status</th>
                                                    <th>Tarikh</th>
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

			<div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Hasil</h5>
								</div>

								
								<div class="card-body">
									<table class="table table-striped table-sm deliverable-datatable">
										<thead>
											<tr>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Pelaksana</th>
                                                    <th>Status</th>
                                                    <th>Tarikh</th>
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
            
            <div class="row">


                <div class="col-6">

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


                <div class="col-6">
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


            </div>
			

			
		</div>



	</main>

@endsection	

@section('script')

<script type="text/javascript">
	function changeProjek() {
		var e = document.getElementById("projekId").value.toString();
		var url = '/jadual-projek/' + e;	
		window.location = url;
	}
</script>

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
            {data: 'pelaksana', name: 'pelaksana'},
            {data: 'status_', name: 'status_'},            
            {data: 'tarikh_rancang', name: 'tarikh_rancang'},
			{data: 'link', name: 'link'},
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
            {data: 'pelaksana', name: 'pelaksana'},
            {data: 'status_', name: 'status_'},            
            {data: 'tarikh_rancang', name: 'tarikh_rancang'},
			{data: 'link', name: 'link'},
        ]
    });


  });
</script>


@endsection