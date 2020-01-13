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
                <div class="col-10" style="font-size: larger">
                    Silahkan pilih layanan yang Anda terima<br><br>
                </div>
                <div class="col-8">
                    <a type="button" class="btn btn-lg btn-success btn-block text-black" href="{{url('lpse')}}">Sistem Layanan Pengadaan Secara Elektronik</a>
                    <a type="button" class="btn btn-lg btn-success btn-block text-black" href="{{url('ppid')}}">Pejabat Pengelola Informasi dan Dokumentasi</a>
                    <a type="button" class="btn btn-lg btn-success btn-block text-black" href="{{url('persandian')}}">Data Statistitik Sektoral dan Persandian</a>
                </div>
            </div>
        </div>
    </main>
{% endblock %}
