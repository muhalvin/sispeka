@extends('template.app')

@section('content')
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
                        <div class="col-md-6 mb-4" hidden>
                            <label>ID</label>
                            <input type="text" class="form-control form-control-user" name="user_id" value="{{ $user_id }}" readonly required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Nama Pengantin Pria <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-user" name="nama_pengantin_lk" value="{{ old('nama_pengantin_lk') }}" required>

                            @error('nama_pengantin_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Nama Pengantin Wanita <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-user" name="nama_pengantin_pr" value="{{ old('nama_pengantin_pr') }}" required>
                            @error('nama_pengantin_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Umur Pria <span style="color: red;">*</span></label>
                            <input type="date" class="form-control form-control-user" name="umur_lk" value="{{ old('umur_lk') }}" required>
                            @error('umur_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Umur Wanita <span style="color: red;">*</span></label>
                            <input type="date" class="form-control form-control-user" name="umur_pr" value="{{ old('umur_pr') }}" required>
                            @error('umur_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>KTP Pria <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="ktp_lk" value="{{ old('ktp_lk') }}" required>
                            @error('ktp_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>KTP Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="ktp_pr" value="{{ old('ktp_pr') }}" required>
                            @error('ktp_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Foto Pengantin Pria <span style="color: red;">*</span></label>
                            <div class="row-md-3 mb-3" style="border: 2px solid gray">
                                <iframe src="" id="img" frameborder="1" width="100%" height="200vh"></iframe>
                            </div>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">File yang diunggah berekstensi jpg/jpeg/png ||
                                    maks. 2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="foto_pengantin_lk" value="{{ old('foto_pengantin_lk') }}" id="foto_pengantin_lk" required>

                            @error('foto_pengantin_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Foto Pengantin Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-3 mb-3" style="border: 2px solid gray">
                                <iframe src="" id="img2" frameborder="1" width="100%" height="200vh"></iframe>
                            </div>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">File yang diunggah berekstensi jpg/jpeg/png ||
                                    maks. 2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="foto_pengantin_pr" value="{{ old('foto_pengantin_pr') }}" id="foto_pengantin_pr" required>

                            @error('foto_pengantin_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Ijasah Pria <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="ijasah_lk" value="{{ old('ijasah_lk') }}" required>
                            @error('ijasah_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Ijasah Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="ijasah_pr" value="{{ old('ijasah_pr') }}" required>
                            @error('ijasah_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Akta Kelahiran Pria <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="akta_lk" value="{{ old('akta_lk') }}" required>
                            @error('akta_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Akta Kelahiran Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="akta_pr" value="{{ old('akta_pr') }}" required>
                            @error('akta_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Pengantar <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_pengantar" value="{{ old('surat_pengantar') }}" required>
                            @error('surat_pengantar')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Keterangan Asal Pria <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_asal_lk" value="{{ old('surat_asal_lk') }}" required>
                            @error('surat_asal_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Keterangan Asal Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_asal_pr" value="{{ old('surat_asal_pr') }}" required>
                            @error('surat_asal_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Persetujuan ORTU Pria <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_persetujuan_ortu_lk" value="{{ old('surat_persetujuan_ortu_lk') }}" required>
                            @error('surat_persetujuan_ortu_lk')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Persetujuan ORTU Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_persetujuan_ortu_pr" value="{{ old('surat_persetujuan_ortu_pr') }}" required>
                            @error('surat_persetujuan_ortu_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Izin Ortu Wanita <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_izin_ortu_pr" value="{{ old('surat_izin_ortu_pr') }}" required>
                            @error('surat_izin_ortu_pr')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>KTP Wali <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="ktp_wali" value="{{ old('ktp_wali') }}" required>
                            @error('ktp_wali')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>FC Kutipan Akta <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="fc_kutipan_akta" value="{{ old('fc_kutipan_akta') }}" required>
                            @error('fc_kutipan_akta')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Surat Pernyataan Status <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_pernyataan_status" value="{{ old('surat_pernyataan_status') }}" required>
                            @error('surat_pernyataan_status')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label>Surat Dispen <span style="color: red;">*</span></label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="surat_dispen" value="{{ old('surat_dispen') }}">
                            @error('surat_dispen')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label>Akta Cerai</label>
                            <div class="row-md-6" style="margin-top: -1vh;">
                                <small style="color: gray; font-size: 10px;">file yang diunggah berekstensi pdf || maks.
                                    2 MB</small>
                            </div>
                            <input type="file" class="form-control form-control-user" name="akta_cerai" value="{{ old('akta_cerai') }}">
                            @error('akta_cerai')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="mt-3">Tanggal Pernikahan <span style="color: red;">*</span></label>
                            <input type="date" class="form-control form-control-user" name="tanggal_pilihan" value="{{ old('tanggal_pilihan') }}" required>
                            @error('tanggal_pilihan')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="mt-3">Tempat Nikah <span style="color: red;">*</span></label>
                            <input type="text" class="form-control form-control-user" name="tempat_nikah" value="{{ old('tempat_nikah') }}" required>
                            @error('tempat_nikah')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="mt-3">Alamat</label>
                            <input type="text" class="form-control form-control-user" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
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

    {{-- script --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('#foto_pengantin_lk').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#img').attr('src', '/assets/no_preview.png');
                }
            });

        });
    </script>
    <script>
        $(function() {
            $('#foto_pengantin_pr').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#img2').attr('src', '/assets/no_preview.png');
                }
            });

        });
    </script>
@endsection
