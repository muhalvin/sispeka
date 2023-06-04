@extends('template.app')

@section('content')
    <!-- Page Heading -->
    @if ($errors->any())
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endforeach
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Detail Pendaftaran Nikah</h6>
        </div>
        <div class="card-body">
            @foreach ($jadwal as $item)
                <form action="{{ url('admin/update-pendaftaran/' . $item->user_id) }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label>Nama Pengantin Pria</label>
                                <input type="text" class="form-control form-control-user" name=""
                                    value="{{ $item->nama_pengantin_lk }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Nama Pengantin Wanita</label>
                                <input type="text" class="form-control form-control-user" name=""
                                    value="{{ $item->nama_pengantin_pr }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Umur Pria</label>
                                <input type="text" class="form-control form-control-user" name=""
                                    value="{{ $item->umur_lk }} Tahun" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Umur Wanita</label>
                                <input type="text" class="form-control form-control-user" name=""
                                    value="{{ $item->umur_pr }} Tahun" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Status Pendaftaran</label>
                                @if ($item->status == 1)
                                    <div style="font-size: 18px;">
                                        <span class="badge badge-warning">Pendaftaran Sedang Dalam Proses</span>
                                    </div>
                                @elseif ($item->status == 2)
                                    <div>
                                        <span class="badge badge-success">Pendaftaran Disetujui</span>
                                    </div>
                                @else
                                    <div>
                                        <span class="badge badge-danger">Pendaftaran Ditolak, Yee Gagal Nikah!</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12" style="padding-top: 2vh;">
                        <a href="{{ route('admin/penjadwalan') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Edit Jadwal Pernikahan</h5>
                </div>
                <form action="{{ route('admin/create-jadwal') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @foreach ($jadwal as $item)
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6 mb-3" hidden>
                                        <label>User ID</label>
                                        <input type="text" class="form-control form-control-user" name="user_id"
                                            value="{{ $item->user_id }}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Penghulu</label>
                                        <input type="text" class="form-control form-control-user" name="penghulu"
                                            value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Biaya</label>
                                        <input type="number" class="form-control form-control-user" name="biaya"
                                            value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control-user" name="tanggal"
                                            value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Jam</label>
                                        <input type="time" class="form-control form-control-user" name="jam"
                                            value="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Buat Jadwal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
