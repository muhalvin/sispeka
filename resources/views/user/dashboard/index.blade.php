@extends('template.app')

@section('content')
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Visi dan Misi</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width:30rem;"
                        src="{{ url('assets/img/kua-peterongan.jpg') }}" alt="Foto Halaman Depan KUA Peterongan">
                </div>
                <h5><b>VISI</b></h5>
                <p>
                    “Terwujudnya Masyarakat Indonesia yang Taat Beragama, Rukun, Cerdas, dan Sejahtera Lahir Batin dalam
                    rangka Mewujudkan Indonesia yang Berdaulat, Mandiri, dan Berkepribadian Gotong Royong”
                    (Keputusan Menteri Agama Nomor 39 Tahun 2015)
                </p>
                <h5><b>MISI</b></h5>
                <p>
                <ul>
                    <li>Meningkatkan pemahaman dan pengamalan ajaran agama</li>
                    <li>Memantapkan kerukunan intra dan antar umat beragama</li>
                    <li>Menyediakan pelayanan kehidupan beragama yang merata dan berkualitas</li>
                    <li>Meningkatkan pemanfaata dan kualitas pengelolaan potensi ekonomi keagamaan</li>
                    <li>Mewujudkan penyelenggaraan ibadah haji dan umrah yang berkualitas dan akuntabel</li>
                    <li>Meningkatkan akses dan kualitas pendidikan umum berciri agama, pendidikan agama pada satuan
                        pendidikan umum, dan pendidikan keagamaan</li>
                    <li>Mewujudkan tatakelola pemerintahan yang bersih, akuntabel, dan terpercaya</li>

                    <br>
                    <span><b>Keputusan Menteri Agama Nomor 39 Tahun 2015</b></span>
                </ul>
                </p>
            </div>
        </div>
    </div>
@endsection
