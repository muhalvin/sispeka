@extends('home')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-3">KUA PETERONGAN</h1>
                                    <p>Silahkan isi data pada kolom yang tersedia!</p>
                                </div>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $message)
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif

                                <!-- Form registrasi -->
                                <form class="user" action="{{ route('registerProses') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email"
                                            placeholder="Email" value="{{ old('email') }}" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="name"
                                            placeholder="Nama Lengkap" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-user"
                                                name="password_confirm" placeholder="Password_confirm">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Registrasi
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p style="font-size: 14px">Sudah memiliki akun?
                                        <span><a href="{{ route('login') }}">Login!</a></span>
                                    </p>
                                </div>
                                <!-- /form login -->
                            </div> <!-- /.p-5 -->
                        </div> <!-- /.col-lg-12 -->
                    </div>
                </div>
            </div>

        </div> <!-- /.col-lg-6 -->

    </div> <!-- /.row -->
@endsection
