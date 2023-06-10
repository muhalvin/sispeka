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
            @foreach ($users as $item)
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
                            <div class="col-md-6 mb-3 mt-3">
                                <label>Foto Pengantin Pria</label>
                                <div class="row-md-6" style="border: 2px solid gray">
                                    <iframe src="{{ url('storage/pendaftaran/FOTO/' . $item->foto_pengantin_lk) }}"
                                        frameborder="4" height="300vh" width="100%"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
                                <label>Foto Pengantin Wanita</label>
                                <div class="row-md-6" style="border: 2px solid gray">
                                    <iframe src="{{ url('storage/pendaftaran/FOTO/' . $item->foto_pengantin_pr) }}"
                                        frameborder="4" height="300vh" width="100%"></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
                                <label>Tanggal Pilihan</label>
                                <input type="text" class="form-control" value="{{ $item->tanggal_pilihan }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3 mt-3">
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
                        <a href="{{ route('admin/pendaftaran') }}" class="btn btn-primary">Kembali</a>
                        @if ($item->status == '1')
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTolak">
                                Tolak Pendaftaran
                            </button>
                            {{-- <a href="{{ url('admin/tolak-pendaftaran/' . $item->user_id) }}" class="btn btn-danger">
                                Tolak
                            </a> --}}
                        @endif

                        @if ($item->status == '1' or $item->status == '3')
                            <button type="submit" class="btn btn-success">Setujui</button>
                        @endif

                        @if ($item->status == '2')
                            @foreach ($jadwal as $row)
                                @if ($row->tanggal == null)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Tentukan Jadwal
                                    </button>
                                @else
                                    <a href="{{ route('admin/penjadwalan') }}" class="btn btn-secondary">
                                        Lihat Jadwal
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Berkas Pendaftaran Nikah</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>KTP Pria</th>
                                <th>KTP Wanita</th>
                                <th>Ijasah Pria</th>
                                <th>Ijasah Wanita</th>
                                <th>Akta Pria</th>
                                <th>Akta Wanita</th>
                                <th>Surat Pengantar</th>
                                <th>Surat Asal Pria</th>
                                <th>Surat Asal Wanita</th>
                                <th>Surat Persetujuan Ortu Pria</th>
                                <th>Surat Persetujuan Ortu Wanita</th>
                                <th>Surat Izin Ortu Wanita</th>
                                <th>KTP Wali</th>
                                <th>FC Kutipan Akta</th>
                                <th>Surat Pernyataan Status</th>
                                <th>Foto Pengantin Pria</th>
                                <th>Foto Pengantin Wanita</th>
                                <th>Surat Dispen</th>
                                <th>Akta Cerai</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/KTP/' . $row->ktp_lk) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/KTP/' . $row->ktp_pr) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/IJASAH/' . $row->ijasah_lk) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/IJASAH/' . $row->ijasah_pr) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/AKTA/' . $row->akta_lk) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/AKTA/' . $row->akta_pr) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ url('storage/pendaftaran/SURAT PENGANTAR/' . $row->surat_pengantar) }}">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($row->surat_asal_lk != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT ASAL/' . $row->surat_asal_lk) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->surat_asal_pr != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT ASAL/' . $row->surat_asal_pr) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($row->surat_persetujuan_ortu_lk != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT PERSETUJUAN/' . $row->surat_persetujuan_ortu_lk) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->surat_persetujuan_ortu_pr != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT PERSETUJUAN/' . $row->surat_persetujuan_ortu_pr) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->surat_izin_ortu_pr != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT IZIN/' . $row->surat_izin_ortu_pr) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->ktp_wali != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/KTP WALI/' . $row->ktp_wali) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->fc_kutipan_akta != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/KUTIPAN AKTA/' . $row->fc_kutipan_akta) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->surat_pernyataan_status != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT STATUS/' . $row->surat_pernyataan_status) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->foto_pengantin_lk != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/FOTO/' . $row->foto_pengantin_lk) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($row->foto_pengantin_pr != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/FOTO/' . $row->foto_pengantin_pr) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($row->surat_dispen != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/SURAT DISPEN/' . $row->surat_dispen) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->akta_cerai != null)
                                            <a class="btn btn-primary" target="_blank"
                                                href="{{ url('storage/pendaftaran/AKTA CERAI/' . $row->akta_cerai) }}">
                                                <i class="bi bi-filetype-pdf"></i>
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada file</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Buat Jadwal Pernikahan</h5>
                </div>
                <form action="{{ route('admin/create-jadwal') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @foreach ($users as $item)
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

    <div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/tolak-pendaftaran/') }}/{{ $id }}" method="post">
                    <input name="_method" type="hidden" value="PATCH">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 mb-3">
                            <label>Pesan</label>
                            <input type="text" class="form-control" name="pesan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
