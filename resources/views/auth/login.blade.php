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
                                    <h1 class="h4 text-gray-900 mb-3">Selamat Datang!</h1>
                                    <p>Masukkan Email dan Password Anda</p>
                                </div>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $message)
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif

                                <!-- Form login -->
                                <form class="user" action="{{ route('loginProses') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email"
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p style="font-size: 14px">Belum memiliki akun?
                                        <span>
                                            <a href="{{ url('/register') }}">Registrasi Akun!</a>
                                        </span>
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
