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
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/">Cipta Aktiviti</a>
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/">Cipta Deliverable</a>
														<a class="dropdown-item" href="/projek/{{ $projek->id }}/">Cipta Invoice</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">Separated link</a>
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
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#dokumen" role="tab" aria-selected="false">
										Dokumen
									</a>  
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#inbois" role="tab" aria-selected="false">
										Inbois
									</a>                                      
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#perubahan" role="tab" aria-selected="false">
										Perubahan
									</a>                                                                       
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#nota" role="tab" aria-selected="false">
										Nota
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
											<div class="card-actions float-end">
												<a href="#" class="me-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
												</a>
												<div class="d-inline-block dropdown show">


													<div class="dropdown-menu dropdown-menu-end">
														<a class="dropdown-item" href="#">Action</a>
														<a class="dropdown-item" href="#">Another action</a>
														<a class="dropdown-item" href="#">Something else here</a>
													</div>
												</div>
											</div>
											<h5 class="card-title mb-0">Aktiviti</h5>
										</div>
										<div class="card-body">

                                        

										</div>
									</div>

									

								</div>




								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Password</h5>

											<form>
												<div class="mb-3">
													<label for="inputPasswordCurrent">Current password</label>
													<input type="password" class="form-control" id="inputPasswordCurrent" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAABKRJREFUWAnNl0tsVGUUxzvTTlslZUaCloZHY6BRFkp9sDBuqgINpaBp02dIDImwKDG6ICQ8jBYlhg0rxUBYEALTpulMgBlqOqHRDSikJkZdGG0CRqAGUuwDovQ1/s7NPTffnTu3zMxGvuT2vP7n8Z3vu+dOi4r+5xUoJH8sFquamZmpTqfTVeIfCARGQ6HQH83NzaP5xsu5gL6+vuVzc3NdJN1Kkhd8Ev1MMYni4uJjra2tt3wwLvUjCxgYGFg8Pj7+MV5dPOUub3/hX0zHIpFId0NDw6Q/jO4tZOzv76+Znp6+AOb5TBw7/YduWC2Hr4J/IhOD/GswGHy7vb39tyw2S+VbAC1/ZXZ29hKoiOE8RrIvaPE5WvyjoS8CX8sRvYPufYpZYtjGS0pKNoD/wdA5bNYCCLaMYMMEWq5IEn8ZDof3P6ql9pF9jp8cma6bFLGeIv5ShdISZUzKzqPIVnISp3l20caTJsaPtwvc3dPTIx06ziZkkyvY0FnoW5l+ng7guAWnpAI5w4MkP6yy0GQy+dTU1JToGm19sqKi4kBjY+PftmwRYn1ErEOq4+i2tLW1DagsNGgKNv+p6tj595nJxUbyOIF38AwipoSfnJyMqZ9SfD8jxlWV5+fnu5VX6iqgt7d3NcFeUiN0n8FbLEOoGkwdgY90dnbu7OjoeE94jG9wd1aZePRp5AOqw+9VMM+qLNRVABXKkLEWzn8S/FtbdAhnuVQE7LdVafBPq04pMYawO0OJ+6XHZkFcBQA0J1xKgyhlB0EChEWGX8RulsgjvOjEBu+5V+icWOSoFawuVwEordluG28oSCmXSs55SGSCHiXhmDzC25ghMHGbdwhJr6sAdpnyQl0FYIyoEX5CeYOuNHg/NhvGiUUxVgfV2VUAxjtqgPecp9oKoE4sNnbX9HcVgMH8nD5nAoWnKM/5ZmKyySRdq3pCmDncR4DxOwVC64eHh0OGLOcur1Vey46xUZ3IcVl5oa4OlJaWXgQwJwZyhUdGRjqE14VtSnk/mokhxnawiwUvsZmsX5u+rgKamprGMDoA5sKhRCLxpDowSpsJ8vpCj2AUPzg4uIiNfKIyNMkH6Z4hF3k+RgTYz6vVAEiKq2bsniZIC0nTtvMVMwBzoBT9tKkTHp8Ak1V8dTrOE+NgJs7VATESTH5WnVAgfHUqlXK6oHpJEI1G9zEZH/Du16leqHyS0UXBNKmeOMf5NvyislJPB8RAFz4g8IuwofLy8k319fUP1EEouw7L7mC3kUTO1nn3sb02MTFxFpsz87FfJuaH4pu5fF+reDz+DEfxkI44Q0ScSbyOpDGe1RqMBN08o+ha0L0JdeKi/6msrGwj98uZMeon1AGaSj+elr9LwK9IkO33n8cN7Hl2vp1N3PcYbUXOBbDz9bwV1/wCmXoS3+B128OPD/l2LLg8l9APXVlZKZfzfDY7ehlQv0PPQDez6zW5JJdYOXdAwHK2dGIv7GH4YtHJIvEOvvunLCHPPzl3QOLKTkl0hPbKaDUvlTU988xtwfMqQBPQ3m/4mf0yBVlDCSr/CRW0CipAMnGzb9XU1NSRvIX7kSgo++Pg9B8wltxxbHKPZgAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
													<small><a href="#">Forgot your password?</a></small>
												</div>
												<div class="mb-3">
													<label for="inputPasswordNew">New password</label>
													<input type="password" class="form-control" id="inputPasswordNew" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAABKRJREFUWAnNl0tsVGUUxzvTTlslZUaCloZHY6BRFkp9sDBuqgINpaBp02dIDImwKDG6ICQ8jBYlhg0rxUBYEALTpulMgBlqOqHRDSikJkZdGG0CRqAGUuwDovQ1/s7NPTffnTu3zMxGvuT2vP7n8Z3vu+dOi4r+5xUoJH8sFquamZmpTqfTVeIfCARGQ6HQH83NzaP5xsu5gL6+vuVzc3NdJN1Kkhd8Ev1MMYni4uJjra2tt3wwLvUjCxgYGFg8Pj7+MV5dPOUub3/hX0zHIpFId0NDw6Q/jO4tZOzv76+Znp6+AOb5TBw7/YduWC2Hr4J/IhOD/GswGHy7vb39tyw2S+VbAC1/ZXZ29hKoiOE8RrIvaPE5WvyjoS8CX8sRvYPufYpZYtjGS0pKNoD/wdA5bNYCCLaMYMMEWq5IEn8ZDof3P6ql9pF9jp8cma6bFLGeIv5ShdISZUzKzqPIVnISp3l20caTJsaPtwvc3dPTIx06ziZkkyvY0FnoW5l+ng7guAWnpAI5w4MkP6yy0GQy+dTU1JToGm19sqKi4kBjY+PftmwRYn1ErEOq4+i2tLW1DagsNGgKNv+p6tj595nJxUbyOIF38AwipoSfnJyMqZ9SfD8jxlWV5+fnu5VX6iqgt7d3NcFeUiN0n8FbLEOoGkwdgY90dnbu7OjoeE94jG9wd1aZePRp5AOqw+9VMM+qLNRVABXKkLEWzn8S/FtbdAhnuVQE7LdVafBPq04pMYawO0OJ+6XHZkFcBQA0J1xKgyhlB0EChEWGX8RulsgjvOjEBu+5V+icWOSoFawuVwEordluG28oSCmXSs55SGSCHiXhmDzC25ghMHGbdwhJr6sAdpnyQl0FYIyoEX5CeYOuNHg/NhvGiUUxVgfV2VUAxjtqgPecp9oKoE4sNnbX9HcVgMH8nD5nAoWnKM/5ZmKyySRdq3pCmDncR4DxOwVC64eHh0OGLOcur1Vey46xUZ3IcVl5oa4OlJaWXgQwJwZyhUdGRjqE14VtSnk/mokhxnawiwUvsZmsX5u+rgKamprGMDoA5sKhRCLxpDowSpsJ8vpCj2AUPzg4uIiNfKIyNMkH6Z4hF3k+RgTYz6vVAEiKq2bsniZIC0nTtvMVMwBzoBT9tKkTHp8Ak1V8dTrOE+NgJs7VATESTH5WnVAgfHUqlXK6oHpJEI1G9zEZH/Du16leqHyS0UXBNKmeOMf5NvyislJPB8RAFz4g8IuwofLy8k319fUP1EEouw7L7mC3kUTO1nn3sb02MTFxFpsz87FfJuaH4pu5fF+reDz+DEfxkI44Q0ScSbyOpDGe1RqMBN08o+ha0L0JdeKi/6msrGwj98uZMeon1AGaSj+elr9LwK9IkO33n8cN7Hl2vp1N3PcYbUXOBbDz9bwV1/wCmXoS3+B128OPD/l2LLg8l9APXVlZKZfzfDY7ehlQv0PPQDez6zW5JJdYOXdAwHK2dGIv7GH4YtHJIvEOvvunLCHPPzl3QOLKTkl0hPbKaDUvlTU988xtwfMqQBPQ3m/4mf0yBVlDCSr/CRW0CipAMnGzb9XU1NSRvIX7kSgo++Pg9B8wltxxbHKPZgAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
												</div>
												<div class="mb-3">
													<label for="inputPasswordNew2">Verify password</label>
													<input type="password" class="form-control" id="inputPasswordNew2" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAABKRJREFUWAnNl0tsVGUUxzvTTlslZUaCloZHY6BRFkp9sDBuqgINpaBp02dIDImwKDG6ICQ8jBYlhg0rxUBYEALTpulMgBlqOqHRDSikJkZdGG0CRqAGUuwDovQ1/s7NPTffnTu3zMxGvuT2vP7n8Z3vu+dOi4r+5xUoJH8sFquamZmpTqfTVeIfCARGQ6HQH83NzaP5xsu5gL6+vuVzc3NdJN1Kkhd8Ev1MMYni4uJjra2tt3wwLvUjCxgYGFg8Pj7+MV5dPOUub3/hX0zHIpFId0NDw6Q/jO4tZOzv76+Znp6+AOb5TBw7/YduWC2Hr4J/IhOD/GswGHy7vb39tyw2S+VbAC1/ZXZ29hKoiOE8RrIvaPE5WvyjoS8CX8sRvYPufYpZYtjGS0pKNoD/wdA5bNYCCLaMYMMEWq5IEn8ZDof3P6ql9pF9jp8cma6bFLGeIv5ShdISZUzKzqPIVnISp3l20caTJsaPtwvc3dPTIx06ziZkkyvY0FnoW5l+ng7guAWnpAI5w4MkP6yy0GQy+dTU1JToGm19sqKi4kBjY+PftmwRYn1ErEOq4+i2tLW1DagsNGgKNv+p6tj595nJxUbyOIF38AwipoSfnJyMqZ9SfD8jxlWV5+fnu5VX6iqgt7d3NcFeUiN0n8FbLEOoGkwdgY90dnbu7OjoeE94jG9wd1aZePRp5AOqw+9VMM+qLNRVABXKkLEWzn8S/FtbdAhnuVQE7LdVafBPq04pMYawO0OJ+6XHZkFcBQA0J1xKgyhlB0EChEWGX8RulsgjvOjEBu+5V+icWOSoFawuVwEordluG28oSCmXSs55SGSCHiXhmDzC25ghMHGbdwhJr6sAdpnyQl0FYIyoEX5CeYOuNHg/NhvGiUUxVgfV2VUAxjtqgPecp9oKoE4sNnbX9HcVgMH8nD5nAoWnKM/5ZmKyySRdq3pCmDncR4DxOwVC64eHh0OGLOcur1Vey46xUZ3IcVl5oa4OlJaWXgQwJwZyhUdGRjqE14VtSnk/mokhxnawiwUvsZmsX5u+rgKamprGMDoA5sKhRCLxpDowSpsJ8vpCj2AUPzg4uIiNfKIyNMkH6Z4hF3k+RgTYz6vVAEiKq2bsniZIC0nTtvMVMwBzoBT9tKkTHp8Ak1V8dTrOE+NgJs7VATESTH5WnVAgfHUqlXK6oHpJEI1G9zEZH/Du16leqHyS0UXBNKmeOMf5NvyislJPB8RAFz4g8IuwofLy8k319fUP1EEouw7L7mC3kUTO1nn3sb02MTFxFpsz87FfJuaH4pu5fF+reDz+DEfxkI44Q0ScSbyOpDGe1RqMBN08o+ha0L0JdeKi/6msrGwj98uZMeon1AGaSj+elr9LwK9IkO33n8cN7Hl2vp1N3PcYbUXOBbDz9bwV1/wCmXoS3+B128OPD/l2LLg8l9APXVlZKZfzfDY7ehlQv0PPQDez6zW5JJdYOXdAwHK2dGIv7GH4YtHJIvEOvvunLCHPPzl3QOLKTkl0hPbKaDUvlTU988xtwfMqQBPQ3m/4mf0yBVlDCSr/CRW0CipAMnGzb9XU1NSRvIX7kSgo++Pg9B8wltxxbHKPZgAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
												</div>
												<button type="submit" class="btn btn-primary">Save changes</button>
											</form>

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