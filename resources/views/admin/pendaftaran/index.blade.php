@extends('template.app')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Calon Pengantin</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Afif</td>
                    <td>11-05-2023</td>
                    <td>Belum</td>
                    <td>
                        <a href="" class="btn btn-info btn-sm"><i class="fas fa-comment"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
