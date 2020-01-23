{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar LaporanRekap{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="container">
    <div class="row" style="margin-left:50vw; margin-bottom:-2vw;">
        <form id="form-pertanyaan" action="carisubmission" method="GET">
            <div class="col-sm-12 input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari ..." name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8"> <h2>Daftar <b>Submisi Survei</b></h2></div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Responden</th>
                    <th>Id Kuesioner</th>
                    <th>Skor Akhir</th>
                    <th>Kritik Saran</th>
                    <th>Tanggal Pengisian Survei</th>
                </tr>
            </thead>
            <tbody>
            {% set i = 1, skipped = (page.current-1) * page.limit %}
            {% for t in page.items %}
                <tr>
                    <td>{{skipped + i}}</td>
                    <td>{{t.getIdResponden()}}</td>
                    <td>{{t.getIdKuesioner()}}</td>
                    <td>{{t.getSkorAkhir()}}</td>
                    <td>{{t.getKritikSaran()}}</td>
                    <td>{{t.getTglSubmit()}}</td>
                </tr>
            {% set i = i + 1 %}
            {% endfor %}
            </tbody>
        </table>
        <div class="text-center text-lg">
            <a href='/SKM-Web/submission'>First</a>
            <a href='/SKM-Web/submission?page={{page.before}}'>Previous</a>
            <a href='/SKM-Web/submission?page={{page.next}}'>Next</a>
            <a href='/SKM-Web/submission?page={{page.last}}'>Last</a>
            <p class="text-success">Anda berada di halaman {{page.current}} dari {{page.total_pages}}</p>
        </div>
    </div>
</div>

{% endblock %}