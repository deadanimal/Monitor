@extends('layouts.app')



@section('content')
    <main class="content">

        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    {{ $meeting->nama }}
                </h1>
                <p class="header-subtitle">{{ $meeting->tarikh }}</p>
            </div>

            <div class="row">

                <div class="col-xl-6">

                    <div class="card">

                        @foreach($notas as $nota)
                        <div class="card-body py-3">
                            <h5>{{$nota->user->name}} ({{$nota->user->organisasi->nama}})</h5>
                            {{$nota->deskripsi}}
                        </div>
                        @endforeach

                        <div class="card-body py-3">

                            <form action="/meeting/{{$meeting->id}}/nota" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Letak nota anda" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Cipta</button>
                            </form>

                        </div>                      
                    </div>

                </div>

                <div class="col-xl-6">

                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Kemaskini Meeting</h5>
                        </div>
                        <div class="card-body py-3">

                            <form action="/meeting/{{$meeting->id}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" value="{{ $meeting->nama }}" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tarikh</label>
                                    <input class="form-control" type="date" value="{{ $meeting->tarikh }}" name="tarikh">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $meeting->deskripsi }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kemaskini</button>
                            </form>

                        </div>
                    </div>                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Senarai Attendance</h5>
                            {{-- <h6 class="card-subtitle text-muted">- - -</h6> --}}
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-sm kosong-datatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>                                        
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peoples as $people)
                                    <tr>
                                        <td>{{ ucwords(strtolower($people->nama)) }}</td>                                        
                                        <td>{{$people->email}}</td> 
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
