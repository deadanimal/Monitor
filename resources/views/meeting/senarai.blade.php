@extends('layouts.app')



@section('content')
    <main class="content">

        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Senarai Meeting
                </h1>
                <p class="header-subtitle">- - -</p>
            </div>

            <div class="row">

                @role('admin|pmo|finance')
                    <div class="col-xl-3">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Cipta Meeting</h5>
                            </div>
                            <div class="card-body py-3">

                                <form action="/meeting" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input class="form-control" type="text" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tarikh</label>
                                        <input class="form-control" type="date" name="tarikh">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Letak tempat, masa, agenda, dengan siapa patut attend dari all sides." rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cipta</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endrole


                <div class="col-xl-9">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Senarai Meeting</h5>
                            <h6 class="card-subtitle text-muted">- - -</h6>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-sm kosong-datatable">
                                <thead>
                                    <tr>
                                        <th>Tarikh</th>
                                        <th>Nama</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meetings as $meeting)
                                        <tr>
                                            <td>{{ $meeting->tarikh }}</td>
                                            <td>{{ $meeting->nama }}</td>
                                            <td><a href="/meeting/{{ $meeting->id }}">Link</a></td>
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
