{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary">Survei Kepuasan Layanan Masyarakat<br>Kota Blitar</h1>
            <hr id="line">

            <br><br>
            <div class="row">
                <div class="col-10" style="font-size: 20px">
                    Silahkan pilih layanan yang Anda terima<br><br>
                </div>
            </div>
            <div class="row justify-content-md-center" style="font-size: larger">
                <div class="thumbnail col-3 text-center">
                    <a href="{{url('lpse')}}">
                        <img src="{{url('assets/lpse.png')}}" alt="LPSE" class="img-responsive img-fluid">
                        <div class="caption">
                            <p>Layanan Pengadaan Secara Elektronik (LPSE)</p>
                        </div>
                    </a>
                </div>
                <div class="thumbnail col-3 text-center">
                    <a href="{{url('ppid')}}">
                        <img src="{{url('assets/ppid.png')}}" alt="PPID" class="img-responsive img-fluid">
                        <div class="caption">
                            <p>Pengelola Informasi dan Dokumentasi (PPID)</p>
                        </div>
                    </a>
                </div>
                <div class="thumbnail col-3 text-center">
                    <a href="{{url('persandian')}}">
                        <img src="{{url('assets/statistik.png')}}" alt="Persandian" class="img-responsive img-fluid">
                        <div class="caption">
                            <p>Data Statistik Sektoral dan Persandian</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
{% endblock %}
