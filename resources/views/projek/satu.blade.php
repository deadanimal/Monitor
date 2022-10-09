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

                                                        @role(['admin','pmo'])
														    <a class="dropdown-item" href="/projek/{{ $projek->id }}/activity/cipta">Cipta Aktiviti</a>
														    <a class="dropdown-item" href="/projek/{{ $projek->id }}/deliverable/cipta">Cipta Hasil</a>
														    <a class="dropdown-item" href="/projek/{{ $projek->id }}/invoice/cipta">Cipta Inbois</a>
                                                            <div class="dropdown-divider"></div>
                                                        @endrole

														                                                        
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/dokumen/muatnaik">Muatnaik Dokumen</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/nota/cipta">Cipta Nota</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/perubahan/cipta">Cipta Perubahan</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/ralat/cipta">Cipta Ralat</a>
                                                        <a class="dropdown-item" href="/projek/{{ $projek->id }}/masalah/cipta">Cipta Masalah</a>
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
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#inbois" role="tab" aria-selected="false">
										Inbois
									</a>
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
                                
                                
							</div>
						</div>
					</div>

           
            





	</main>

@endsection	

@section('script')


@endsection