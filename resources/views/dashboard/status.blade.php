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


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Senarai Aktiviti Lambat</h5>
                    </div>

                    <div class="card-body">



                        <table class="table table-striped table-sm activity-datatable">
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

                                @foreach($act_lambats as $act)
                                <tr>
                                    <td>{{ $act->tarikh_rancang }}</td>
                                    <td>{{ $act->pekerja->name }}</td>
                                    <td>{{ $act->projek->nama }}</td>
                                    <td>{{ $act->nama }}</td>
                                    <td><a href="/projek/{{$act->projek->id}}/activity/{{$act->id}}">Link</a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>


            </div>


        </div>

        <div class="row">


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Senarai Aktiviti Tidak Siap Oleh Pelaksana</h5>
                    </div>

                    <div class="card-body">



                        <table class="table table-striped table-sm activity-datatable">
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

                                @foreach($act_tidak_siaps as $act)
                                <tr>
                                    <td>{{ $act->tarikh_rancang }}</td>
                                    <td>{{ $act->pekerja->name }}</td>
                                    <td>{{ $act->projek->nama }}</td>
                                    <td>{{ $act->nama }}</td>
                                    <td><a href="/projek/{{$act->projek->id}}/activity/{{$act->id}}">Link</a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>


            </div>


        </div>        

        <div class="row">


            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Senarai Aktiviti Siap Oleh Pelaksa</h5>
                    </div>

                    <div class="card-body">



                        <table class="table table-striped table-sm activity-datatable">
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

                                @foreach($act_siaps as $act)
                                <tr>
                                    <td>{{ $act->tarikh_rancang }}</td>
                                    <td>{{ $act->pekerja->name }}</td>
                                    <td>{{ $act->projek->nama }}</td>
                                    <td>{{ $act->nama }}</td>
                                    <td><a href="/projek/{{$act->projek->id}}/activity/{{$act->id}}">Link</a></td>
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
