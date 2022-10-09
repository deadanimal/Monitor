@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Profil Pengguna
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

						{{$user->name}}
						{{$user->email}}
						{{$user->organisasi->nama}}

                            <form action="/change-password" method="POST">
                                @csrf       
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password">
                                </div>   
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" name="confirm_password">                                 
                                </div>                                 
                                   
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </form>

						</div>
					</div>
				</div>

            </div>

            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Lokasi</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>
								
							</div>
                            
                            
                </div>


			</div>	
			
			
            <div class="row">

                <div class="col-xl-12">

                <div class="card">
								<div class="card-header">
									<h5 class="card-title">Senarai Log</h5>
									<h6 class="card-subtitle text-muted">- - -</h6>
								</div>
								
							</div>
                            
                            
                </div>


			</div>				
			

			
		</div>



	</main>

@endsection	

@section('script')


@endsection