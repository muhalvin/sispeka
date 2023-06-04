@extends('template.app')

@section('content')
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Pendaftaran Nikah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengantin Pria</th>
                            <th>Nama Pengantin Wanita</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_pengantin_lk }}</td>
                                <td>{{ $row->nama_pengantin_pr }}</td>
                                <td>
                                    @if ($row->status == 1)
                                        <a class="badge badge-warning">Proses</a>
                                    @elseif ($row->status == 2)
                                        <a class="badge badge-success">Disetujui</a>
                                    @elseif ($row->status == 3)
                                        <a class="badge badge-danger">Ditolak</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ url('admin/detail-pendaftaran/' . $row->user_id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
