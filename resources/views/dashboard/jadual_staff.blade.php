@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Jadual {{$piper->name}}
				</h1>                                                     			
			</div>

															

			<div class="row">

				<!-- <div class="col-xl-3">
					<div class="card">
						<div class="card-body">
													<label>Staff</label>
													<select class="form-control mb-3" id="staffId" name="staffId" onchange="changeStaff()">
														@foreach($pipers as $pipe)
														<option value="{{ $pipe->id }}">{{ $pipe->roles[0]->display_name }} -  {{ $pipe->name }} </option>
														@endforeach
                                                        @foreach ($umpa_remotes as $umpa_remote)
                                                            <option value="{{ $umpa_remote->id }}">{{ $umpa_remote->roles[0]->display_name }} -  {{ $umpa_remote->name }} </option>
                                                        @endforeach   														
                                                    </select> 	
						</div>													
					</div>
				</div> -->



                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Aktiviti</h5>
								</div>

								<div class="card-body">
									
								

									<table class="table table-striped table-sm activity-datatable">
										<thead>
											<tr>
													<th>Tarikh</th>												
													<th>Pelanggan</th>
													<th>Projek</th>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>                                                    
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
													<th>Tarikh</th>												
													<th>Pelanggan</th>
													<th>Projek</th>
													<th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
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

<!-- <script type="text/javascript">
	function changeStaff() {
		var e = document.getElementById("staffId").value.toString();
		var url = '/jadual-staff/' + e;	
		window.location = url;
	}
</script> -->

<script type="text/javascript">
  $(function () {


    var table = $('.activity-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
		order: [[0, 'asc']],
        ajax: "/pengguna/{{$piper->id}}/activity",
        columns: [	
			{data: { 
				_: "tarikh_rancang.display", 
				sort: "tarikh_rancang.timestamp", 
				filter: 'tarikh_rancang.display' }, name: 'tarikh_rancang.display'},			
            {data: 'pelanggan', name: 'pelanggan'},
            {data: 'projek', name: 'projek'},
            {data: 'nama', name: 'nama'},			
            {data: 'kategori', name: 'kategori'},
            {data: 'status_', name: 'status_'},        
			{data: 'link', name: 'link'},
        ]
    });



    var table = $('.deliverable-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
		order: [[0, 'asc']],
        ajax: "/pengguna/{{$piper->id}}/deliverable",
        columns: [	
			{data: { 
				_: "tarikh_rancang.display", 
				sort: "tarikh_rancang.timestamp", 
				filter: 'tarikh_rancang.display' }, name: 'tarikh_rancang.display'},			
            {data: 'pelanggan', name: 'pelanggan'},
            {data: 'projek', name: 'projek'},
            {data: 'nama', name: 'nama'},			
            {data: 'kategori', name: 'kategori'},
            {data: 'status_', name: 'status_'},            
			{data: 'link', name: 'link'},
        ]
    });


  });
</script>

@endsection