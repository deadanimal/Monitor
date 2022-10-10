@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
                    Aktiviti
				</h1>
				<p class="header-subtitle">{{$act->projek->nama}}: {{$act->nama}}</p>
			</div>

			<div class="row">

                <div class="col-xl-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Maklumat</h5>
                                    </div>

                                    <div class="card-body">                                    

                                        <table class="table table-striped table-sm activity-datatable">                                            
                                            <tbody>	
                                                <tr>
                                                        <td>Projek</td>
                                                        <td>{{$act->projek->nama}}</td>
                                                </tr>   
                                                <tr>
                                                        <td>Nama</td>
                                                        <td>{{$act->nama}}</td>
                                                </tr> 
                                                <tr>
                                                        <td>Kategori</td>
                                                        <td> {{ Str::title($act->kategori) }}</td>
                                                </tr>
                                                <tr>
                                                        <td>Status</td>
                                                        <td>{{ Str::title($act->status) }}</td>
                                                </tr>   
                                                <tr>
                                                        <td>Pelaksana</td>
                                                        <td>{{$act->pekerja->name}}</td>
                                                </tr>   
                                                <tr>
                                                        <td>Penyelaras</td>
                                                        <td>{{$act->supervisor->name}}</td>
                                                </tr>                                                                                                 
                                                <tr>
                                                        <td>Tarikh Rancang</td>
                                                        <td>{{$act->tarikh_rancang}}</td>
                                                </tr>  
                                                <tr>
                                                        <td>Tarikh Siap</td>
                                                        <td>{{$act->tarikh_siap}}</td>
                                                </tr>                                                                                                                                                                                                                                                                                              																				
                                            </tbody>
                                        </table>	

                                        <h4>Deskripsi Kerja</h4>
                                        {{$act->deskripsi}}

                                        @if ($act->deskripsi_ok)
                                        <h4>Deskripsi Progress</h4>
                                        {{$act->deskripsi_ok}}
                                        @endif     

                                        @if ($act->deskripsi_ko)
                                        <h4>Deskripsi Progress</h4>
                                        {{$act->deskripsi_ko}}
                                        @endif  

                                        @if ($act->deskripsi_sah)
                                        <h4>Deskripsi Pengesahan</h4>
                                        {{$act->deskripsi_sah}}
                                        @endif  

                                                                       
                                                
                                    </div>
                                                    
                                    
                                </div>
                                
                                
                </div>

                <div class="col-xl-6">
                        
                        <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Kemaskini</h5>
                                    </div>

                                    <div class="card-body"> 


                            <form action="/projek/{{$act->projek->id}}/activity/{{$act->id}}/kemaskini" method="POST">
                                @csrf         
                                      
                                <div class="mb-3">
                                    <label class="form-label">Jenis</label>
                                    <select class="form-control mb-3" name="jenis">										
                                        <option value="SAH">Penyelaras - Pengesahan </option>           
                                        <option value="OK">Pelaksana - Tiada Masalah </option>                         
                                        <option value="KO">Pelaksana - Bermasalah </option> 
									</select>                                    
                                </div>   
                                <div class="mb-3">
                                    <label class="form-label">Kenyataan</label>
                                    <div class="textwrapper">
                                                <textarea id="text" 
                                                    name="deskripsi"
                                                    class="form-control mb-3"
                                                    cols="2" 
                                                    rows="5"                                                                                                     
                                                    style="width:100%;"></textarea>                                    
                                </div>                                                                                
                                <button type="submit" class="btn btn-primary">Kemaskini</button>
                            </form>
                            
                            
                                    </div>    
                        </div>                        
                        
                                
                                
                </div>                


			</div>		
				
			

			
		</div>



	</main>

@endsection	

@section('script')


@endsection