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
                    <th>Nama Responden</th>
                    <th>Nama Layanan</th>
                    <th>Skor Akhir</th>
                    <th>Kritik Saran</th>
                    <th>Tanggal Pengisian Survei</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            {% set i = 1, skipped = (page.current-1) * page.limit, j = 0 %}
            {% for t in page.items %}
                <tr>
                    <td>{{skipped + i}}</td>
                    <td>{{res[j].nama_responden}}</td>
                    <td>{{res[j].nama_layanan}}</td>
                    <td>{{t.getSkorAkhir()}}</td>
                    <td>{{t.getKritikSaran()}}</td>
                    <td>{{t.getTglSubmit()}}</td>
                    <td>
                        <a href="#lihatSubmissionModal{{t.getIdIsiSubmit()}}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Lihat"></i></a>
                    </td>
                </tr>
            {% set i = i + 1, j = j + 1 %}
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

{% if temp.count() > 0 %}
{% set i = 0 %}
{% for t in temp %}
<div id="lihatSubmissionModal{{t.getIdIsiSubmit()}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">						
                    <h4 class="modal-title">Lihat Detail Submission</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="height:50vh; overflow-y:auto;">
                    <table class="table table-striped table-hover">
                        <thread>
                            <tr>
                                <th>Id Pertanyaan</th>
                                <th>Nilai</th>
                            </tr>
                        </thread>
                        <tbody>
                        {% for d in detail[i] %}
                            <tr>
                                <td>{{d.konten_pertanyaan}}</td>
                                <td>{{d.nilai}}</td>
                            </tr>
                        {% endfor %}
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Keluar">
                </div>
        </div>
    </div>
</div>
{% set i = i + 1 %}
{% endfor %}
{% endif %}

{% endblock %}