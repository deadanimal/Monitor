@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Projek
				</h1>
				<p class="header-subtitle">Manage organisation</p>
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

                            <form action="/projek" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                </div>         
                                <div class="mb-3">
                                    <label class="form-label">Simbol</label>
                                    <input class="form-control" type="text" name="simbol">
                                </div>        
                                <div class="mb-3">
                                    <label class="form-label">organisasi</label>
                                    <input class="form-control" type="text" name="organisasi">
                                </div>                                               
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

						</div>
					</div>
				</div>

                <div class="col-xl-7">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Always responsive</h5>
									<h6 class="card-subtitle text-muted">Across every breakpoint, use <code>.table-responsive</code> for horizontally scrolling
										tables.</h6>
								</div>
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Nama</th>
												<th scope="col">Simbol</th>

											</tr>
										</thead>
										<tbody>

                                            @foreach ($projeks as $projek)
                                            <tr>
												<th scope="row">{{ $projek->id }}</th>
												<td>{{ $projek->nama }}</td>
												<td>{{ $projek->simbol }}</td>
											</tr>    
                                            @endforeach                                        

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


@endsection