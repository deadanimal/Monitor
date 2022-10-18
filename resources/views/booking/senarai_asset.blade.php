@extends('layouts.app')



@section('content')
    <main class="content">

        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Booking
                </h1>
                <p class="header-subtitle">- - -</p>
            </div>

            <div class="row">

                @role('admin|finance|pmo')
                <div class="col-xl-3">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Cipta Asset</h5>
                            <h6 class="card-subtitle text-muted">- - -</h6>
                        </div>

                        <div class="card-body">

                            <form action="/booking-asset" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Letak deskripsi anda" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>                            
  
                        </div>


                    </div>


                </div>    
                @endrole            

                <div class="col-xl-12">


                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Senarai Asset</h5>
                            <h6 class="card-subtitle text-muted">- - -</h6>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-sm asset-datatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assets as $asset)
                                    <tr>
                                        <td>{{ $asset->nama }}</td>
                                        <td>{{ $asset->deskripsi }}</td>
                                        <td><a href="/booking-asset/{{ $asset->id }}">Link</a></td>
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
