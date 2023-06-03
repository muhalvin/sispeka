@extends('template.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Form Pendafaran Pernikahan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('storePendaftaran') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-md-6 mb-3" hidden>
                            <label>ID</label>
                            <input type="text" class="form-control form-control-user" name="user_id"
                                value="{{ $user_id }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Pengantin Pria</label>
                            <input type="text" class="form-control form-control-user" name="nama_pengantin_lk"
                                value="{{ old('nama_pengantin_lk') }}">
                            @error('nama_pengantin_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Pengantin Wanita</label>
                            <input type="text" class="form-control form-control-user" name="nama_pengantin_pr"
                                value="{{ old('nama_pengantin_pr') }}">
                            @error('nama_pengantin_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Umur Pria</label>
                            <input type="int" maxlength="2" class="form-control form-control-user" name="umur_lk"
                                value="{{ old('umur_lk') }}">
                            @error('umur_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Umur Wanita</label>
                            <input type="int" maxlength="2" class="form-control form-control-user" name="umur_pr"
                                value="{{ old('umur_pr') }}">
                            @error('umur_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>KTP Pria</label>
                            <input type="file" class="form-control form-control-user" name="ktp_lk"
                                value="{{ old('ktp_lk') }}">
                            @error('ktp_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>KTP Wanita</label>
                            <input type="file" class="form-control form-control-user" name="ktp_pr"
                                value="{{ old('ktp_pr') }}">
                            @error('ktp_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ijasah Pria</label>
                            <input type="file" class="form-control form-control-user" name="ijasah_lk"
                                value="{{ old('ijasah_lk') }}">
                            @error('ijasah_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ijasah Wanita</label>
                            <input type="file" class="form-control form-control-user" name="ijasah_pr"
                                value="{{ old('ijasah_pr') }}">
                            @error('ijasah_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Akta Kelahiran Pria</label>
                            <input type="file" class="form-control form-control-user" name="akta_lk"
                                value="{{ old('akta_lk') }}">
                            @error('akta_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Akta Kelahiran Wanita</label>
                            <input type="file" class="form-control form-control-user" name="akta_pr"
                                value="{{ old('akta_pr') }}">
                            @error('akta_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Pengantar</label>
                            <input type="file" class="form-control form-control-user" name="surat_pengantar"
                                value="{{ old('surat_pengantar') }}">
                            @error('surat_pengantar')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Keterangan Asal Pria</label>
                            <input type="file" class="form-control form-control-user" name="surat_asal_lk"
                                value="{{ old('surat_asal_lk') }}">
                            @error('surat_asal_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Keterangan Asal Wanita</label>
                            <input type="file" class="form-control form-control-user" name="surat_asal_pr"
                                value="{{ old('surat_asal_pr') }}">
                            @error('surat_asal_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Persetujuan ORTU Pria</label>
                            <input type="file" class="form-control form-control-user" name="surat_persetujuan_ortu_lk"
                                value="{{ old('surat_persetujuan_ortu_lk') }}">
                            @error('surat_persetujuan_ortu_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Persetujuan ORTU Wanita</label>
                            <input type="file" class="form-control form-control-user" name="surat_persetujuan_ortu_pr"
                                value="{{ old('surat_persetujuan_ortu_pr') }}">
                            @error('surat_persetujuan_ortu_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Izin Ortu Wanita</label>
                            <input type="file" class="form-control form-control-user" name="surat_izin_ortu_pr"
                                value="{{ old('surat_izin_ortu_pr') }}">
                            @error('surat_izin_ortu_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>KTP Wali</label>
                            <input type="file" class="form-control form-control-user" name="ktp_wali"
                                value="{{ old('ktp_wali') }}">
                            @error('ktp_wali')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>FC Kutipan Akta</label>
                            <input type="file" class="form-control form-control-user" name="fc_kutipan_akta"
                                value="{{ old('fc_kutipan_akta') }}">
                            @error('fc_kutipan_akta')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Pernyataan Status</label>
                            <input type="file" class="form-control form-control-user" name="surat_pernyataan_status"
                                value="{{ old('surat_pernyataan_status') }}">
                            @error('surat_pernyataan_status')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Foto Biru</label>
                            <input type="file" class="form-control form-control-user" name="foto_biru"
                                value="{{ old('foto_biru') }}">
                            @error('foto_biru')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Surat Dispen</label>
                            <input type="file" class="form-control form-control-user" name="surat_dispen"
                                value="{{ old('surat_dispen') }}">
                            @error('surat_dispen')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Akta Cerai</label>
                            <input type="file" class="form-control form-control-user" name="akta_cerai"
                                value="{{ old('akta_cerai') }}">
                            @error('akta_cerai')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('pendaftaran') }}" class="btn btn-secondary">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
