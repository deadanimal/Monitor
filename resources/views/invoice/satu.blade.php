@extends('layouts.app')



@section('content')

<main class="content">

    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Invoice
            </h1>
            <p class="header-subtitle">{{$invoice->projek->nama}}: {{$invoice->nama}}</p>
        </div>

        <div class="row">

            <div class="col-xl-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Maklumat</h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-striped table-sm invoiceivity-datatable">
                            <tbody>
                                <tr>
                                    <td>Projek</td>
                                    <td>{{$invoice->projek->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{$invoice->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td> {{ Str::title($invoice->kategori) }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ Str::title($invoice->status) }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>RM {{ number_format($invoice->jumlah/100, 2, '.', ',') }}</td>
                                </tr>
                                <tr>
                                    <td>Pencipta</td>
                                    <td>{{$invoice->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Tarikh Rancang</td>
                                    <td>{{$invoice->tarikh_rancang}}</td>
                                </tr>
                                <tr>
                                    <td>Tarikh Hantar</td>
                                    <td>{{$invoice->tarikh_hantar}}</td>
                                </tr>
                                <tr>
                                    <td>Tarikh Bayar</td>
                                    <td>{{$invoice->tarikh_bayar}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h4>Deskripsi Inbois</h4>
                        {{$invoice->deskripsi}}




                    </div>


                </div>


            </div>









        </div>



        <div class="row">

            @role('admin|pmo')
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Inbois</h5>
                    </div>
                    <div class="card-body">

                        <form action='/projek/{{ $invoice->projek->id }}/invoice/{{$invoice->id}}' method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{$invoice->nama}}" placeholder="Nama Invoice">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori"
                                        value="{{$invoice->kategori}}" placeholder="kategori Invoice">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="title">Jumlah</label>
                                    <input type="number" class="form-control" step='0.01' id="jumlah" name="jumlah"
                                        value="{{$invoice->jumlah}}" required>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Tarikh Rancang</label>

                                    <!-- <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
                                                                                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker-date">
                                                                                                                        <div class="input-group-text" data-target="#datetimepicker-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                                                                                                </div>                                                     -->
                                    <input type="date" class="form-control" id="tarikh_rancang" name="tarikh_rancang"
                                        value="{{$invoice->tarikh_rancang}}">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Tarikh Hantar</label>

                                    <!-- <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
                                                                                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker-date">
                                                                                                                        <div class="input-group-text" data-target="#datetimepicker-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                                                                                                </div>                                                     -->
                                    <input type="date" class="form-control" id="tarikh_hantar" name="tarikh_hantar"
                                        value="{{$invoice->tarikh_hantar}}">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label>Tarikh Bayar</label>

                                    <!-- <div class="input-group date" id="datetimepicker-date" data-target-input="nearest">
                                                                                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker-date">
                                                                                                                        <div class="input-group-text" data-target="#datetimepicker-date" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                                                                                                </div>                                                     -->
                                    <input type="date" class="form-control" id="tarikh_bayar" name="tarikh_bayar"
                                        value="{{$invoice->tarikh_bayar}}">
                                </div>



                                <div class="mb-3 col-md-12">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"
                                        placeholder="Deksripsi untuk invoice"
                                        rows="3">{{$invoice->deskripsi}}</textarea>
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