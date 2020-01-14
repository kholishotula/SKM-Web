{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Survei Kepuasan Masyarakat</span><br>
            LAYANAN DATA STATISTIK SEKTORAL DAN PERSANDIAN</h1>
            <hr id="line">

            <br><br>
            <center>
                <div class="row">
                    <h3>Terima kasih Anda telah meluangkan waktu untuk mengisi survei kami</h3>
                </div>
                <div class="row" style="font-size: larger">
                    <p>Skor pelayanan Persandian kami : {{ skor }}</p>
                </div>
                <a type="button" class="btn btn-success text-black" href="{{url('survei')}}" style="font-size: larger">Isi Kuesioner Lain</a>
            </center>
        </div>
    </main>
</div>
{% endblock %}
