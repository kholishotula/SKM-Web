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
                <div class="col-10" style="font-size: larger">
                    Bapak/Ibu/Saudara Yang Terhormat,<br><br>
                    <p class="text-justify">
                        Survei Kepuasan Masyarakat (SKM) adalah alat untuk mengukur kepuasan masyarakat secara komprehensif sebagai pengguna layanan berdasar atas pendapat masyarakat dalam memperoleh pelayanan dari penyelenggara pelayanan publik. Bagi penyelenggara, SKM ini bertujuan sebagai upaya untuk meningkatkan kualitas pelayanan publik dan mengetahui kinerja pelayanan aparatur pemerintah kepada masyarakat.<br><br>
                        Penyelenggara pelayanan publik wajib melakukan Survei Kepuasan Masyarakat secara berkala minimal 1 (satu) kali setahun. Survei ini dilakukan berdasar atas Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 16 Tahun 2014 Tentang Pedoman Survei Kepuasan Masyarakat Terhadap Penyelenggaraan Pelayanan Publik.<br><br>
                        Berikut adalah panduan pengisian survei :
                    </p>
                    <!--VIDEO DISINI-->
                    <p>
                        Silahkan isi survei <a class="text-info font-weight-bold" href="{{url('survei')}}">DISINI</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
