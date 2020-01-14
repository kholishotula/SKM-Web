{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar Kuesioner{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Kelola <b>Kuesioner</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#tambahKuesionerModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Kuesioner</span></a>
                    <a href="#deleteKuesionerModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Hapus</span></a>						
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
                    <th>Judul Kuesioner</th>
                    <th>Kategori Layanan</th>
                </tr>
            </thead>
            
        </table>
    </div>
</div>

<div id="editKuesionerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Kuesioner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    <input type="submit" class="btn btn-success" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="tambahKuesionerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {{form.startForm()}}
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
                        <label><b>{{form.getLabel('keterangan_kuesioner')}}</b></label>
                        {{form.render('keterangan_kuesioner')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('fk_layanan')}}</b></label>
                        {{form.render('fk_layanan')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('fk_pertanyaan')}}</b></label>
                        {{form.render('fk_pertanyaan')}}
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    {{form.render('Simpan')}}
                </div>
            {{form.endForm()}}
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
                    <input type='hidden' value='id_kuesioner' name='id_kuesioner' id='id_kuesioner'>	
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