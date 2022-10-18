@extends('layouts.app')



@section('content')

<main class="content">

    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                {{ $asset->nama }}
            </h1>
            <p class="header-subtitle">- - -</p>
        </div>

        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Senarai kosong</h5>
                        <h6 class="card-subtitle text-muted">- - -</h6>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-sm kosong-datatable">
                            <thead>
                                <tr>
                                    <th>Tarikh</th>
                                    <th>Mesej</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
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