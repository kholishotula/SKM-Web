{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Panduan Pengisian</span> 
            Survei Kepuasan Layanan Masyarakat<br>Kota Blitar</h1>
            <hr id="line">

            <br><br>
            <div class="row">
                <div class="col-8" style="font-size: larger">
                    Bapak/Ibu/Saudara Yang Terhormat,<br><br>
                    <p class="text-justify">
                        Survei Kepuasan Masyarakat (SKM) adalah alat untuk mengukur kepuasan masyarakat secara komprehensif sebagai pengguna layanan berdasar atas pendapat masyarakat dalam memperoleh pelayanan dari penyelenggara pelayanan publik. Bagi penyelenggara, SKM ini bertujuan sebagai upaya untuk meningkatkan kualitas pelayanan publik dan mengetahui kinerja pelayanan aparatur pemerintah kepada masyarakat.<br><br>
                        Penyelenggara pelayanan publik wajib melakukan Survei Kepuasan Masyarakat secara berkala minimal 1 (satu) kali setahun. Survei ini dilakukan berdasar atas Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 16 Tahun 2014 Tentang Pedoman Survei Kepuasan Masyarakat Terhadap Penyelenggaraan Pelayanan Publik.
                    </p>
                </div>
                <div class="col-4">
                    <img src="{{url('assets/help.png')}}" alt="panduan" class="img-responsive img-fluid">
                </div>
            </div>
            <div class="row" style="font-size: larger; text-align: center">
                <div class="col-md-6 mr-auto ml-auto" >
                    <h4>Berikut adalah panduan pengisian survei :</h4>
                    <div class="card card-raised card-carousel" style="border: solid black 0px;">
                        <div id="carouselPanduan" class="carousel slide" data-ride="carousel" data-interval="4000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{url('assets/panduan/1.gif')}}" alt="Slide Satu">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{url('assets/panduan/2.gif')}}" alt="Slide Dua">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{url('assets/panduan/3.gif')}}" alt="Slide Tiga">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{url('assets/panduan/4.gif')}}" alt="Slide Empat">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselPanduan" style="color:black; font-size:200%;" role="button" data-slide="prev">
                                <i class="material-icons"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselPanduan" style="color:black; font-size:200%;" role="button" data-slide="next">
                                <i class="material-icons"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <p>
                        Silahkan isi survei <a class="text-info font-weight-bold" href="{{url('survei')}}">DISINI</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
