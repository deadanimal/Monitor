@extends('layouts.app')



@section('content')

<main class="content">

    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                {{$transaksi->nama}}
            </h1>
        </div>


        <div class="row">





            <div class="col-xl-12">

                <div class="card">


                    <div class="card-body" id="html-output">

                    </div>


                </div>


            </div>


        </div>

        <div class="col-xl-12">

            @if (auth()->user()->id == $transaksi->user_id)
            <div class="card">


                <div class="card-body" onload="scriptRan()">

                    <form action="/projek/{{$transaksi->projek->id}}/transaksi/{{$transaksi->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input class="form-control" type="text" name="nama" value="{{$transaksi->nama}}">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="textwrapper">
                                    <textarea id="markdown-input" name="deskripsi" class="form-control mb-3" cols="2"
                                        rows="10" id="rules" onkeyup="scriptRan()"
                                        style="width:100%;">{{$transaksi->deskripsi}}</textarea>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>


            </div>

        </div>
        @endif


    </div>



</main>

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
<script type="text/javascript">
var converter = new showdown.Converter(),
    text = document.getElementById("markdown-input").value,
    html = converter.makeHtml(text);
document.getElementById('html-output').innerHTML = html;



function scriptRan() {
    var converter = new showdown.Converter(),
        text = document.getElementById("markdown-input").value,
        html = converter.makeHtml(text);
    document.getElementById('html-output').innerHTML = html;
}
</script>

@endsection