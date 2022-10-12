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
                                    <td>Pemeriksa</td>
                                    <td>
                                        @if(empty($deli->pemeriksa))
                                        -
                                        @else
                                        {{$deli->pemeriksa->name}}
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>Pengesah</td>
                                    <td>
                                        @if(empty($deli->pengesah))
                                        -
                                        @else
                                        {{$deli->pengesah->name}}
                                        @endif

                                    </td>
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

                                    <option value="OK">Pelaksana - Siap </option>
                                    <option value="KO">Pelaksana - Bermasalah </option>
                                    <option value="PE-OK">Pemeriksa - Lulus </option>
                                    <option value="PE-KO">Pemeriksa - Gagal </option>
                                    <option value="PG-OK">Pengesah - Lulus </option>
                                    <option value="PG-KO">Pengesah - Gagal </option>
                                    <option value="SAH">Penyelaras - Pengesahan </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kenyataan</label>
                                <div class="textwrapper">
                                    <textarea id="text" name="deskripsi" class="form-control mb-3" cols="2" rows="5"
                                        style="width:100%;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kemaskini</button>
                        </form>


                    </div>
                </div>



            </div>


        </div>



        <div class="row">

            @role('admin|pmo')
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Hasil</h5>
                    </div>
                    <div class="card-body">

                        <form action='/projek/{{ $projek->id}}/deliverable/{{$deli->id}}' method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{$deli->nama}}" placeholder="Nama Hasil">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Kategori</label>
                                    <select class="form-control mb-3" id="kategori" name="kategori">
                                        <option value="ANALISA" {{ $deli->kategori == 'ANALISA' ? 'selected' : '' }}>
                                            Analisa</option>
                                        <option value="PEMBANGUNAN"
                                            {{ $deli->kategori == 'PEMBANGUNAN' ? 'selected' : '' }}>Pembangunan
                                        </option>
                                        <option value="PENGUJIAN"
                                            {{ $deli->kategori == 'PENGUJIAN' ? 'selected' : '' }}>Pengujian</option>
                                        <option value="LATIHAN" {{ $deli->kategori == 'LATIHAN' ? 'selected' : '' }}>
                                            Latihan</option>
                                        <option value="PENTADBIRAN"
                                            {{ $deli->kategori == 'PENTADBIRAN' ? 'selected' : '' }}>Pentadbiran
                                        </option>
                                        <option value="LAIN" {{ $deli->kategori == 'LAIN' ? 'selected' : '' }}>Lain-lain
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Tarikh</label>

                                    <!-- <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
                                                                                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker-date">
                                                                                                                        <div class="input-group-text" data-target="#datetimepicker-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                                                                                                </div>                                                     -->
                                    <input type="date" class="form-control" id="tarikh_rancang" name="tarikh_rancang"
                                        value="{{$deli->tarikh_rancang}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Pelaksana</label>

                                    <select class="form-control mb-3" id="pekerja_id" name="pekerja_id">
                                        @foreach ($pipers as $piper)
                                        <option value="{{ $piper->id }}"
                                            {{ $deli->pekerja_id == $piper->id ? 'selected' : '' }}>
                                            {{ $piper->roles[0]->display_name }} - {{ $piper->name }} </option>
                                        @endforeach
                                        @foreach ($umpa_remotes as $umpa_remote)
                                        <option value="{{ $umpa_remote->id }}"
                                            {{ $deli->pekerja_id == $umpa_remote->id ? 'selected' : '' }}>
                                            {{ $umpa_remote->roles[0]->display_name }} - {{ $umpa_remote->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Pemeriksa</label>

                                    <select class="form-control mb-3" id="pemeriksa_id" name="pemeriksa_id">
                                        @foreach ($pipers as $piper)
                                        <option value="{{ $piper->id }}"
                                            {{ $deli->pemeriksa_id == $piper->id ? 'selected' : '' }}>
                                            {{ $piper->roles[0]->display_name }} - {{ $piper->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Pengesah</label>

                                    <select class="form-control mb-3" id="pengesah_id" name="pengesah_id">
                                        @foreach ($pipers as $piper)
                                        <option value="{{ $piper->id }}"
                                            {{ $deli->pengesah_id == $piper->id ? 'selected' : '' }}>
                                            {{ $piper->roles[0]->display_name }} - {{ $piper->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="Deksripsi untuk Hasil" rows="3">{{$deli->deskripsi}}</textarea>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary">Ubah</button>

                        </form>


                    </div>
                </div>

            </div>
            @endrole


        </div>




    </div>



</main>

@endsection

@section('script')


@endsection