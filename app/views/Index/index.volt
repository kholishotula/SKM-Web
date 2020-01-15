{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Selamat Datang</span> 
            di Survei Kepuasan Layanan Masyarakat<br>Kota Blitar</h1>
            <hr id="line">

            <div class="row">
                <div id="demo" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="hover">
                    <ol class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img img-fluid img-responsive" src="{{url('assets/bg1.jpg')}}" alt="Dinas Komunikasi, Informatika, dan Statistika Kota Blitar">
                        </div>
                        <div class="carousel-item">
                            <img class="img img-fluid img-responsive" src="{{url('assets/bg2.jpg')}}" alt="LPSE">
                        </div>
                        <div class="carousel-item">
                            <img class="img img-fluid img-responsive" src="{{url('assets/bg3.jpg')}}" alt="PPID">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <br><br>
            <div class="row clearfix">
                <div class="col-8" style="padding-left: 10%">
                    <h4>Terima kasih telah menggunakan layanan Dinas Komunikasi, Informatika, dan Statistik Kota Blitar. Demi perbaikan kami ke depannya, silahkan isi survei kepuasan berikut.</h4>
                </div>
                <div class="col-4 text-center">
                    <a type="button" class="btn btn-lg btn-outline-dark" href="{{url('panduan')}}">Panduan</a><br><br>
                    <a type="button" class="btn btn-lg btn-outline-dark" href="{{url('survei')}}">Isi Survei</a>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
