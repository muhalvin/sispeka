@extends('template.app')

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    {!! $usersChart->container() !!}
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    {!! $pendaftarChart->container() !!}
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    {!! $nikahChart->container() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Jadwal Akad Nikah</h6>
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="col-md-4 p-0 mt-3 mb-3" style="display: flex;">
                    <select name="search" id="" class="form-control" style="border-radius: 0;">
                        <option value=""></option>
                        <option value="week">Minggu</option>
                        <option value="month">Bulan</option>
                    </select>
                    <button class="btn btn-primary" style="border-radius: 0;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengantin Pria</th>
                            <th>Nama Pengantin Wanita</th>
                            <th>Tanggal Nikah</th>
                            <th>Tempat Nikah</th>
                            <th>Jam</th>
                            <th>Penghulu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($show as $row)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_pengantin_lk }}</td>
                                <td>{{ $row->nama_pengantin_pr }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->tempat_nikah }}</td>
                                <td>{{ $row->jam }}</td>
                                <td>{{ $row->penghulu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 mt-2" style="float: right;">
                {{ $show->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

    <script src="{{ $usersChart->cdn() }}"></script>
    <script src="{{ $pendaftarChart->cdn() }}"></script>
    <script src="{{ $nikahChart->cdn() }}"></script>

    {{ $usersChart->script() }}
    {{ $pendaftarChart->script() }}
    {{ $nikahChart->script() }}
@endsection
