@extends('layouts.app')
 

 
@section('content')

	<main class="content">

		<div class="container-fluid">

			<div class="header">
				<h1 class="header-title">
					Rujukan
				</h1>
				<p class="header-subtitle"></p>
			</div>

            <div class="row">

                <div class="col-xl-6">

                    <div class="card">
	

								<div class="card-body">

                                <form action="/rujukan" method="POST">
                                    @csrf

                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-control mb-3" name="kategori">
                                        <option value="ANALISA">Analisa</option>
                                        <option value="PEMBANGUNAN">Pembangunan</option>
                                        <option value="PENGUJIAN">Pengujian</option>
                                        <option value="LAIN">Lain</option>
									</select>                                    
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


				            

                <div class="col-xl-6">

                    <div class="card">
								<div class="card-header">
									<h5 class="card-title">Output</h5>                                 
								</div>

								<div class="card-body" id="html-output">
									
								</div>

								
							</div>
                            
                            
                    </div>


			    </div>		
			

			
		</div>



	</main>

@endsection	

@section('script')

<script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
<script type="text/javascript">



    function scriptRan() {
        var converter = new showdown.Converter(),
            text      = document.getElementById("markdown-input").value,
            html      = converter.makeHtml(text);
        document.getElementById('html-output').innerHTML = html;
    }

</script>

@endsection