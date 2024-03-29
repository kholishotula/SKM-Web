{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar LaporanRekap{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="container">
    <div class=style="width:200px; height:200px;">
        <canvas id="myChart"></canvas>
    </div>
    <div class="table-wrapper">
        <div class="table-title" style="display:none">
            <div class="row">
                <div class="col-sm-8"> <h2>Daftar <b>Responden yang Mengisi Survei</b></h2></div>
            </div>
        </div>
        <table id="dataTable" class="table table-striped table-hover" style="display:none"> 
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
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
    <div class="row" style="margin-left:50vw; margin-bottom:-2vw;">
        <form id="form-pertanyaan" action="carilaporan" method="GET">
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
                <div class="col-sm-8"><h2>Kelola <b>Laporan Rekapitulasi Survei</b></h2></div>
            </div>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <a href="#tambahLaporanRekapModal"  class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i><span>Tambah Laporan Rekap</span></a>
                    <a href="#deleteLaporanRekapModal" id="coba2" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i><span>Hapus</span></a>						
                </div>
            </div>
        </div>
        {% if page.items != null %}
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>No.</th>
                    <th>Judul Laporan</th>
                    <th>Tahun Laporan</th>
                    <th>Terakhir Unggah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            {% set i = 1, skipped = (page.current-1) * page.limit %}
                {% for t in page.items %}
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options" value="{{t.getId()}}">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td>{{skipped + i}}</td>
                        <td>{{t.getJudulLapor()}}</td>
                        <td>{{t.getTahunLapor()}}</td>
                        <td>{{t.getTglUpload()}}</td>
                        <td>
                            <a href="#lihatLaporanRekapModal{{t.getId()}}" class="view" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Lihat" value="{{t.getFile()}}"></i></a>
                            <a href="#editLaporanRekapModal{{t.getId()}}" class="edit" data-toggle="modal" data-remote="{{url('laporanrekap/ubah?')}}"><i class="fa fa-pencil" data-toggle="tooltip" title="Ubah" value="{{t.getId()}}"></i></a>
                            <a href="#deleteLaporanRekapModal{{t.getId()}}" class="delete" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip"  title="Hapus" value='{{t.getId()}}'></i></a>
                        </td>
                    </tr>
                {% set i = i + 1 %}
                {% endfor %}
            </tbody>
        </table>
        {% else %}
            <h2 class="text-danger text-center">Tidak ada data yang dapat ditampilkan</h2>
        {% endif %}
        <div class="text-center text-lg">
            <a href='/SKM-Web/tempil-rekap'>First</a>
            <a href='/SKM-Web/tampil-rekap?page={{page.before}}'>Previous</a>
            <a href='/SKM-Web/tampil-rekap?page={{page.next}}'>Next</a>
            <a href='/SKM-Web/tampil-rekap?page={{page.last}}'>Last</a>
            <p class="text-success">Anda berada di halaman {{page.current}} dari {{page.total_pages}}</p>
        </div>
    </div>
</div>

{% if temp.count() > 0 %}
{% for t in temp %}
<div id="lihatLaporanRekapModal{{t.getId()}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-laporanrekap' action='laporanrekap/lihat' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Lihat Laporan Rekapitulasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="{{t.getFile()}}"  width="350px" height="500px">						
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Keluar">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editLaporanRekapModal{{t.getId()}}" class="modal fade">
    <div class="modal-dialog modal-custom">
        <div class="modal-content">
            <form id='form-laporanrekap' action='laporanrekap/ubah' method='post' enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Ubah Laporan Rekapitulasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type='hidden' value='{{t.getId()}}' name='id_laporan' id='id_laporan'>
                    </div>						
                    <div class="form-group">
                        <label><b>{{form.getLabel('judul_laporan')}}</b></label>
                        <input type="text" name="judul_laporan" class="form-control" value="{{t.getJudulLapor()}}" placeholder="Masukkan Judul">
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('tahun_laporan')}}</b></label>
                        <input type="text" name="tahun_laporan" class="form-control" value="{{t.getTahunLapor()}}" placeholder="Masukkan Tahun">
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('file_laporan')}}</b></label>
                        <input type="file" name="file_laporan" class="form-control" value="{{t.getFile()}}" placeholder="Tambah File">
                    </div>						
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    {{form.render('Simpan')}}
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deleteLaporanRekapModal{{t.getId()}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-laporanrekap' action='tampil-rekap' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Hapus Laporan Rekapitulasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <input type='hidden' value='{{t.getId()}}' name='id_laporan' id='id_laporan'>
                    <p>Apakah Anda yakin untuk menghapus data yang telah dipilih ?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    <input type="submit" class="btn btn-danger" value="Hapus">
                </div>
            </form>
        </div>
    </div>
</div>
{% endfor %}
{% endif %}

<div id="deleteLaporanRekapModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-laporanrekap' action='tampil-rekap' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Hapus Laporan Rekapitulasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <input type='hidden' value='' name='id_laporans' id='hiddens'>
                    <p>Apakah Anda yakin untuk menghapus data yang telah dipilih ?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    <input type="submit" class="btn btn-danger" value="Hapus">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="tambahLaporanRekapModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-laporanrekap' action='laporanrekap/tambah' method='POST' enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Tambah Laporan Rekapitulasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">									
                    <div class="form-group">
                        <label><b>{{form.getLabel('judul_laporan')}}</b></label>
                        {{form.render('judul_laporan')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('tahun_laporan')}}</b></label>
                        {{form.render('tahun_laporan')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('file_laporan')}}</b></label>
                        {{form.render('file_laporan')}}
                    </div>						
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    {{form.render('Simpan')}}
                </div>
            </form>
        </div>
    </div>
</div>

{% endblock %}