{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar Kuesioner{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="container">
    <div class="notif-block">
        {% if notif !='' %}
            {{ this.flash.success(notif) }}
        {% endif %}
        {% if error !='' %}
            {{ this.flash.error(error) }}
        {% endif %}
    </div>
    <div class="row" style="margin-left:50vw; margin-bottom:-2vw;">
        <form id="form-pertanyaan" action="carikuesioner" method="GET">
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
                <div class="col-sm-6"><h2>Kelola <b>Kuesioner</b></div>
                <div class="col-sm-6">
                    <a href="#tambahKuesionerModal"  class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Tambah Kuesioner</span></a>
                    <a href="#deleteKuesionerModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Hapus</span></a>						
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>No.</th>
                    <th>Kategori Layanan</th>
                    <th>Keterangan Kuesioner</th>
                    <th>Kode Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            {% set i = 1, skipped = (page.current-1) * page.limit %}
            {% for t in page.items %}
                <tr>
					<td>
						<span class="custom-checkbox">
							<input type="checkbox" id="checkbox1" name="options[]" value="1">
							<label for="checkbox1"></label>
						</span>
					</td>
                    <td>{{skipped + i}}</td>
                    <td>{{t.getKategori()}}</td>
                    <td>{{t.getKeterangan()}}</td>
                    <td>{{t.getKode()}}</td>
                    <td>
                        <a href="#editKuesionerModal{{t.getId()}}" class="edit" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" title="Ubah"></i></a>
                        <a href="#deleteKuesionerModal" class="delete" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="tooltip" title="Hapus" value="{{t.getId()}}"></i></a>
                    </td>
                </tr>
            {% set i = i + 1 %}
            {% endfor %}
            </tbody>
        </table>
        <div class="text-center text-lg">
            <a href='/SKM-Web/kuesioner'>First</a>
            <a href='/SKM-Web/kuesioner?page={{page.before}}'>Previous</a>
            <a href='/SKM-Web/kuesioner?page={{page.next}}'>Next</a>
            <a href='/SKM-Web/kuesioner?page={{page.last}}'>Last</a>
            <p class="text-success">Anda berada di halaman {{page.current}} dari {{page.total_pages}}</p>
        </div>
    </div> 
</div>

{% for t in temp %}
<div id="editKuesionerModal{{t.getId()}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-kuesioner' action='kuesioner/ubah' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Ubah Kuesioner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type='hidden' value='{{t.getId()}}' name='id_kuesioner' id='id_kuesioner'>										
                    <div class="form-group">
                        <label><b>{{form.getLabel('kode_verifikasi')}}</b></label>
                        <input type='text' name='kode_verifikasi' class="form-control" value="{{t.getKode()}}" placeholder="Masukkan Kode Verifikasi">
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('kritik_saran')}}</b></label>
                        <input type='text' name='kritik_saran' class="form-control" value="{{t.getKeterangan()}}" placeholder="Masukkan Keterangan">
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('kategori_layanan')}}</b></label>
                       <input type='text' name='kategori_layanan' class="form-control" value="{{t.getKategori()}}" placeholder="Masukkan Kategori Layanan">
                    </div>
                    <div class="form-group">
                        <label><b>Tambah Pertanyaan</b></label>
                        <input type="text" data-role="tagsinput" name="pilihan" id="pilihan" value="{% for p in pertanyaan %}{{p.getId()~"-"~ p.getKonten() ~","}}{% endfor %}">
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
{% endfor %}

<div id="tambahKuesionerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
             <form id="form-kuesioner" action="kuesioner/tambah" method="POST">
                <div class="modal-header">						
                    <h4 class="modal-title">Tambah Kuesioner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label><b>{{form.getLabel('kode_verifikasi')}}</b></label>
                        {{form.render('kode_verifikasi')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('kritik_saran')}}</b></label>
                        {{form.render('kritik_saran')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('kategori_layanan')}}</b></label>
                        {{form.render('kategori_layanan')}}
                    </div>
                    <div class="form-group">
                        <label><b>Tambah Pertanyaan</b></label>
                        <input type="text" disable data-role="tagsinput" name="pilihan" id="pilihan" value="{% for p in pertanyaan %}{{p.getId()~"-"~ p.getKonten() ~","}}{% endfor %}">
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

<div id="deleteKuesionerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-kuesioner' action='kuesioner' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Hapus Kuesioner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <input type='hidden' value='{{t.getId()}}' name='id_kuesioner' id='id_kuesioner'>	
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

{% endblock %}