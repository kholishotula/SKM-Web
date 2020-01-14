{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar Pertanyaan{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Kelola <b>Pertanyaan</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#tambahPertanyaanModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Pertanyaan</span></a>
                    <a href="#deletePertanyaanModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Hapus</span></a>						
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
                    <th>Judul Pertanyaan</th>
                    <th>Kategori Layanan</th>
                </tr>
            </thead>
            
        </table>
    </div>
</div>

<div id="tambahPertanyaanModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {{form.startForm()}}
                <div class="modal-header">						
                    <h4 class="modal-title">Tambah Pertanyaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        {{form.render('konten_pertanyaan')}}
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

<div id="editPertanyaanModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">						
                    <h4 class="modal-title">Ubah Pertanyaan</h4>
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
                    <input type="submit" class="btn btn-info" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="deletePertanyaanModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-pertanyaan' action='pertanyaan' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Hapus Pertanyaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <input type='hidden' value='id_pertanyaan' name='id_pertanyaan' id='id_pertanyaan'>	
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