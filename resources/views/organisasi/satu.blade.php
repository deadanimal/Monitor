@extends('layouts.app')



@section('content')

<main class="content">

    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Organisasi
            </h1>
            <p class="header-subtitle">{{$org->nama}}</p>
        </div>

        <div class="row">

            <div class="col-xl-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Maklumat</h5>
                    </div>

                    <div class="card-body">

                        {{$org}}

                        <table class="table table-striped table-sm activity-datatable">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    <th>Projek</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>


                </div>


            </div>

            <div class="col-xl-6">




            </div>


        </div>




    </div>



</main>

@endsection

@section('script')


@endsection