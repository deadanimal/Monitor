@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
                    Hasil
				</h1>
				<p class="header-subtitle">{{$deli->projek->nama}}: {{$deli->nama}}</p>
			</div>

			<div class="row">

                <div class="col-xl-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Maklumat</h5>
                                    </div>

                                    <div class="card-body">                                    

                                        <table class="table table-striped table-sm deliverable-datatable">                                            
                                            <tbody>	
                                                <tr>
                                                        <td>Projek</td>
                                                        <td>{{$deli->projek->nama}}</td>
                                                </tr>   
                                                <tr>
                                                        <td>Nama</td>
                                                        <td>{{$deli->nama}}</td>
                                                </tr> 
                                                <tr>
                                                        <td>Kategori</td>
                                                        <td> {{ Str::title($deli->kategori) }}</td>
                                                </tr>
                                                <tr>
                                                        <td>Status</td>
                                                        <td>{{ Str::title($deli->status) }}</td>
                                                </tr>   
                                                <tr>
                                                        <td>Pelaksana</td>
                                                        <td>{{$deli->pekerja->name}}</td>
                                                </tr>   
                                                <tr>
                                                        <td>Penyelaras</td>
                                                        <td>{{$deli->supervisor->name}}</td>
                                                </tr>                                                                                                 
                                                <tr>
                                                        <td>Tarikh Rancang</td>
                                                        <td>{{$deli->tarikh_rancang}}</td>
                                                </tr>  
                                                <tr>
                                                        <td>Tarikh Siap</td>
                                                        <td>{{$deli->tarikh_siap}}</td>
                                                </tr>                                                                                                                                                                                                                                                                                              																				
                                            </tbody>
                                        </table>	

                                        <h4>Deskripsi Kerja</h4>
                                        {{$deli->deskripsi}}

                                        @if ($deli->deskripsi_ok)
                                        <h4>Deskripsi Progress</h4>
                                        {{$deli->deskripsi_ok}}
                                        @endif     

                                        @if ($deli->deskripsi_ko)
                                        <h4>Deskripsi Progress</h4>
                                        {{$deli->deskripsi_ko}}
                                        @endif  

                                        @if ($deli->deskripsi_sah)
                                        <h4>Deskripsi Pengesahan</h4>
                                        {{$deli->deskripsi_sah}}
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


                            <form action="/projek/{{$deli->projek->id}}/deliverable/{{$deli->id}}/kemaskini" method="POST">
                                @csrf         
                                      
                                <div class="mb-3">
                                    <label class="form-label">Jenis</label>
                                    <select class="form-control mb-3" name="jenis">										
                                        <option value="SAH">Penyelaras - Pengesahan </option>           
                                        <option value="OK">Pelaksana - Siap </option> 
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