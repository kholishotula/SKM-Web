<!-- Header Content -->
        <!-- Nav tabs -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #945455; font-family: Courier New, Courier, monospace; font-size: 16px">
            <a class="nav-link text-black" href="{{url()}}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    {% if session.get('auth') %}
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('kuesioner')}}">Kuesioner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('pertanyaan')}}">Pertanyaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('tampil-rekap')}}">Laporan Rekapitulasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('submission')}}">Submission Survei</a>
                        </li>
                    {% else %} 
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('panduan')}}">Panduan</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('survei')}}">Survei Kuesioner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('laporan')}}">Laporan Survei</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('laporan-rekap')}}">Laporan Rekapitulasi</a>
                        </li>
                    {% endif %}
                </ul>
                <ul class="navbar-nav ml-auto">
                    {% if session.get('auth') %}
                        <a class="nav-link text-black" href="{{url('profile')}}">Selamat Datang, <span class="text-info">{{ session.get('auth')['username'] }}</span></a>
                        <a class="nav-link btn btn-danger" href="{{url('logout')}}">Log Out</a>
                    {% else %}
                        <a class="nav-link text-black" href="{{url('login')}}">Log In</a>
                    {% endif %}
                </ul>
            </div>
        </nav>
    <div class="intro">
    </div>
<!-- END Header Content -->