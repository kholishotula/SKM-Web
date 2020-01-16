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
                        Berdasarkan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 16 Tahun 2014 Tentang Pedoman Survei Kepuasan Masyarakat Terhadap Penyelenggaraan Pelayanan Publik, penyelenggara pelayanan publik wajib memublikasikan hasil survei-nya.<br><br>
                        Berikut adalah laporan hasil survei :
                    </p>
                    <p>
                        <!--LINK HASIL DISINI-->
                        {% for lapor in laporan %}
                            <a href='{{ lapor.getFile() }}' download>Survei Kepuasan Masyarakat Tahun {{ lapor.getTahunLapor() }}</a><br>
                        {% endfor %}
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
