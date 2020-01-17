{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Pengisian Data Responden</span><br>
            LAYANAN PENGELOLA INFORMASI DAN DOKUMENTASI (PPID)</h1>
            <hr id="line">

            <br><br>
            <div class="row" style="font-size: larger">
                <div class="col-12" style="font-size: 16px">{{ flashSession.output() }}</div>
                <div class="col-md-6">
                    {{ form.startForm()}}
                        <div class="form-group">
                            <label>Nama</label>
                            {{form.render('nama') }}
                        </div>
                        <div class="form-group">
                            <label>Asal Kota</label><br>
                            {{form.render('Kota') }}
                            {{form.getLabel('Kota')}}<br>
                            {{form.render('LuarKota')}}
                            {{form.getLabel('LuarKota')}}
                            {{form.render('tulisKota')}}
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label><br>
                            {{form.render('pekerjaan')}}
                        </div>
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            {{ form.render('nama_instansi') }}
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            {{ form.render('Laki') }}
                            {{ form.getLabel('Laki') }}
                            {{ form.render('Perempuan') }}
                            {{ form.getLabel('Perempuan') }}
                        </div>
                        <div class="form-group">
                            <label>Pendidikan Terakhir</label><br>
                            {{ form.render('SMAK') }}
                            {{ form.getLabel('SMAK') }}
                            {{ form.render('Diploma') }}
                            {{ form.getLabel('Diploma') }}
                            {{ form.render('S1') }}
                            {{ form.getLabel('S1') }}
                            {{ form.render('S23') }}
                            {{ form.getLabel('S23') }}
                        </div>
                        <div class="form-group">
                            {{ form.render('Lanjut') }}
                        </div style="margin-left:50px;">
                    {{ form.endForm() }}
                </div>
            </div>
        </div>
    </main>
</div>
{% endblock %}
