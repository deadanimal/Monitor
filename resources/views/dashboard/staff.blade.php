@extends('layouts.app')



@section('content')

<main class="content">

    <div class="container-fluid">

        <div class="header">
            <h1 class="header-title">
                Dashboard
            </h1>
        </div>

        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Senarai Aktiviti</h5>
                    </div>

                    <div class="card-body">



                        <table class="table table-striped table-sm activity-datatable">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    <th>Projek</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Tarikh</th>
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

        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Senarai Hasil</h5>
                    </div>


                    <div class="card-body">
                        <table class="table table-striped table-sm deliverable-datatable">
                            <thead>
                                <tr>
                                    <th>Pelanggan</th>
                                    <th>Projek</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Tarikh</th>
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

<script type="text/javascript">
$(function() {

    var table = $('.activity-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        order: [
            [0, 'asc']
        ],
        ajax: "/pengguna/{{$user->id}}/activity",
        columns: [{
                data: {
                    _: "tarikh_rancang.display",
                    sort: "tarikh_rancang.timestamp",
                    filter: 'tarikh_rancang.display'
                },
                name: 'tarikh_rancang.display'
            },
            {
                data: 'pelanggan',
                name: 'pelanggan'
            },
            {
                data: 'projek',
                name: 'projek'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'status_',
                name: 'status_'
            },
            {
                data: 'link',
                name: 'link'
            },
        ]
    });


});
</script>

<script type="text/javascript">
$(function() {

    var table = $('.deliverable-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        order: [
            [0, 'asc']
        ],
        ajax: "/pengguna/{{$user->id}}/deliverable",
        columns: [{
                data: {
                    _: "tarikh_rancang.display",
                    sort: "tarikh_rancang.timestamp",
                    filter: 'tarikh_rancang.display'
                },
                name: 'tarikh_rancang.display'
            },
            {
                data: 'pelanggan',
                name: 'pelanggan'
            },
            {
                data: 'projek',
                name: 'projek'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'status_',
                name: 'status_'
            },
            {
                data: 'link',
                name: 'link'
            },
        ]
    });


});
</script>

@endsection