{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Laporan</span> 
            Survei Kepuasan Layanan Masyarakat<br>Kota Blitar</h1>
            <hr id="line">

            <br><br>
            <div class="row">
                <div class="col-10" style="font-size: larger">
                    Bapak/Ibu/Saudara Yang Terhormat,<br><br>
                    <p class="text-justify">
                        Berdasarkan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 16 Tahun 2014 Tentang Pedoman Survei Kepuasan Masyarakat Terhadap Penyelenggaraan Pelayanan Publik, penyelenggara pelayanan publik wajib memublikasikan hasil survei-nya.
                    </p>
                    <div class=style="width:200px; height:200px;">
                        <canvas id="myChart"></canvas>
                        <div class="pull-right">
                            {% set var = "25-40 : Tidak Puas , " ~ "41-60 : Kurang Puas , " ~ "61-80 : Puas , " ~ "81-100 : Sangat Puas" %}
                            <h8><b>{{var}}</b></h8> 
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <div class="table-title" style="display:none">
                            <div class="row">
                                <div class="col-sm-8"> <h2>Daftar Jumlah <b>Responden Berdasarkan Tingkat Kepuasan</b></h2></div>
                            </div>
                        </div>
                        <table id="dataTable1" class="table table-striped table-hover" style="display:none">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nilai Kepuasan</th>
                                    <th>Jumlah Responden</th>
                                </tr>
                            </thead>
                            <tbody>
                            {% set i = 1%}
                            {% for i in 1.. datas|length %}
                                <tr>
                                    <th>{{i}}</th>
                                    <th>{{datas[i-1]['ranges']}}</th>
                                    <th>{{datas[i-1]['total']}}</th>
                                </tr>
                            {% set i = i + 1 %}
                            {% endfor %}
                            <tbody>
                        </table>
                    </div>
                    <p>
                        {% if laporan.count() >  0 %}
                        Berikut adalah laporan hasil survei :
                        <!--LINK HASIL DISINI-->
                        {% for lapor in laporan %}
                            <a href='{{ lapor.getFile() }}' download>Survei Kepuasan Masyarakat Tahun {{ lapor.getTahunLapor() }}</a><br>
                        {% endfor %}
                        {% endif %}
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
