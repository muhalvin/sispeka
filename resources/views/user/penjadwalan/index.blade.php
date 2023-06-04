@extends('template.app')

@section('content')
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Jadwal Pelaksanaan Nikah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penghulu</th>
                            <th>Nama Pengantin Pria</th>
                            <th>Nama Pengantin Wanita</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->penghulu }}</td>
                                <td>{{ $row->nama_pengantin_lk }}</td>
                                <td>{{ $row->nama_pengantin_pr }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->jam }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
