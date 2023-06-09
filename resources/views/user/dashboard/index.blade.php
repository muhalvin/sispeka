@extends('template.app')

@section('content')
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Tentang Kami</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width:30rem;"
                        src="{{ url('assets/img/kua-peterongan.jpg') }}" alt="Foto Halaman Depan KUA Peterongan">
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro libero sunt laudantium expedita unde
                    recusandae ducimus sint, quisquam consectetur, possimus quae dignissimos? Voluptatum esse quam, nemo in
                    deserunt adipisci at!
                </p>
            </div>
        </div>
    </div>
@endsection
