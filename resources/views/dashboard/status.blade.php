@extends('layouts.app')



@section('content')
    <main class="content">

        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Status
                </h1>
            </div>

            <div class="row">




                <div class="col-2">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Menu</h5>
                        </div>

                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list"
                                href="#aktiviti-lambat" role="tab">
                                Aktiviti Lambat
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list"
                                href="#aktiviti-tidak-siap" role="tab">
                                Aktiviti Tidak Siap
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#aktiviti-siap"
                                role="tab">
                                Aktiviti Semakan
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#aktiviti-depan"
                                role="tab">
                                Aktiviti Depan
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#hasil-lambat"
                                role="tab">
                                Hasil Lambat
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#hasil-tidak-siap"
                                role="tab">
                                Hasil Tidak Siap
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#hasil-siap"
                                role="tab">
                                Hasil Semakan
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#hasil-depan"
                                role="tab">
                                Hasil Depan
                            </a>
                        </div>
                    </div>

                </div>



                <div class="col-10">

                    <div class="tab-content">


                        <div class="tab-pane fade active show" id="aktiviti-lambat" role="tabpanel">


                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Aktiviti Lambat</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($act_lambats as $act)
                                                <tr>
                                                    <td>{{ $act->tarikh_rancang }}</td>
                                                    <td>{{ $act->pekerja->name }}</td>
                                                    <td>{{ $act->projek->nama }}</td>
                                                    <td>{{ $act->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $act->projek->id }}/activity/{{ $act->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>

                        </div>


                        <div class="tab-pane fade active" id="aktiviti-tidak-siap" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Aktiviti Tidak Siap Oleh Pelaksana</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($act_tidak_siaps as $act)
                                                <tr>
                                                    <td>{{ $act->tarikh_rancang }}</td>
                                                    <td>{{ $act->pekerja->name }}</td>
                                                    <td>{{ $act->projek->nama }}</td>
                                                    <td>{{ $act->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $act->projek->id }}/activity/{{ $act->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>


                        </div>


                        <div class="tab-pane fade active" id="aktiviti-siap" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Aktiviti Siap Oleh Pelaksa</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($act_siaps as $act)
                                                <tr>
                                                    <td>{{ $act->tarikh_rancang }}</td>
                                                    <td>{{ $act->pekerja->name }}</td>
                                                    <td>{{ $act->projek->nama }}</td>
                                                    <td>{{ $act->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $act->projek->id }}/activity/{{ $act->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>


                        </div>



                        <div class="tab-pane fade active" id="aktiviti-depan" role="tabpanel">


                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Aktiviti Masa Depan Oleh Pelaksa</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($act_nantis as $act)
                                                <tr>
                                                    <td>{{ $act->tarikh_rancang }}</td>
                                                    <td>{{ $act->pekerja->name }}</td>
                                                    <td>{{ $act->projek->nama }}</td>
                                                    <td>{{ $act->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $act->projek->id }}/activity/{{ $act->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>

                        </div>


                        <div class="tab-pane fade active" id="hasil-lambat" role="tabpanel">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Hasil Lambat</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($deli_lambats as $deli)
                                                <tr>
                                                    <td>{{ $deli->tarikh_rancang }}</td>
                                                    <td>{{ $deli->pekerja->name }}</td>
                                                    <td>{{ $deli->projek->nama }}</td>
                                                    <td>{{ $deli->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $deli->projek->id }}/deliverable/{{ $deli->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>


                        </div>


                        <div class="tab-pane fade active" id="hasil-tidak-siap" role="tabpanel">


                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Hasil Tidak Siap</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($deli_tidak_siaps as $deli)
                                                <tr>
                                                    <td>{{ $deli->tarikh_rancang }}</td>
                                                    <td>{{ $deli->pekerja->name }}</td>
                                                    <td>{{ $deli->projek->nama }}</td>
                                                    <td>{{ $deli->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $deli->projek->id }}/deliverable/{{ $deli->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>


                        </div>


                        <div class="tab-pane fade active" id="hasil-siap" role="tabpanel">


                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Hasil Siap</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($deli_siaps as $deli)
                                                <tr>
                                                    <td>{{ $deli->tarikh_rancang }}</td>
                                                    <td>{{ $deli->pekerja->name }}</td>
                                                    <td>{{ $deli->projek->nama }}</td>
                                                    <td>{{ $deli->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $deli->projek->id }}/deliverable/{{ $deli->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>


                        </div>


                        <div class="tab-pane fade active" id="hasil-depan" role="tabpanel">


                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Senarai Hasil Masa Depan</h5>
                                </div>

                                <div class="card-body">



                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tarikh</th>
                                                <th>Pelaksana</th>
                                                <th>Projek</th>
                                                <th>Nama</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($deli_nantis as $deli)
                                                <tr>
                                                    <td>{{ $deli->tarikh_rancang }}</td>
                                                    <td>{{ $deli->pekerja->name }}</td>
                                                    <td>{{ $deli->projek->nama }}</td>
                                                    <td>{{ $deli->nama }}</td>
                                                    <td><a
                                                            href="/projek/{{ $deli->projek->id }}/deliverable/{{ $deli->id }}">Link</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>



                        </div>

                    </div>



                </div>


            </div>







        </div>



    </main>
@endsection
