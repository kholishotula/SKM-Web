{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar Pertanyaan{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="container">
    <div class="row" style="margin-left:50vw; margin-bottom:-2vw;">
        <form id="form-pertanyaan" action="caripertanyaan" method="GET">
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
                <div class="col-sm-6"><h2>Kelola <b>Pertanyaan</b></h2></div>
                <div class="col-sm-6">
                    <a href="#tambahPertanyaanModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i> <span>Tambah Pertanyaan</span></a>
                    <a href="#deletePertanyaanModal" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i> <span>Hapus</span></a>						
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
                    <th>Aksi</th>
                </tr>
            </thead>
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
                    <td>{{t.getKonten()}}</td>
                    <td>
                        <a href="#editPertanyaanModal{{t.getId()}}" class="edit" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" title="Ubah" value='{{t.getId()}}'></i></a>
                        <a href="#deletePertanyaanModal" class="delete" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete" value='{{t.getId()}}'></i></a>
                    </td>
                </tr>
            {% set i = i + 1 %}
            {% endfor %}
            </tbody>
        </table>
        <div class="text-center text-lg">
            <a href='/SKM-Web/pertanyaan'>First</a>
            <a href='/SKM-Web/pertanyaan?page={{page.before}}'>Previous</a>
            <a href='/SKM-Web/pertanyaan?page={{page.next}}'>Next</a>
            <a href='/SKM-Web/pertanyaan?page={{page.last}}'>Last</a>
            <p class="text-success">Anda berada di halaman {{page.current}} dari {{page.total_pages}}</p>
        </div>
    </div>
</div>

<div id="tambahPertanyaanModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-pertanyaan" action="pertanyaan/tambah" method="POST">
                <div class="modal-header">						
                    <h4 class="modal-title">Tambah Pertanyaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label><b>{{form.getLabel('konten_pertanyaan')}}</b></label>
                        {{form.render('konten_pertanyaan')}}
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

{% for t in temp %}
<div id="editPertanyaanModal{{t.getId()}}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-pertanyaan" action="pertanyaan/ubah" method="POST">
                <div class="modal-header">						
                    <h4 class="modal-title">Ubah Pertanyaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type='hidden' value='{{t.getId()}}' name='id_pertanyaan' id='id_pertanyaan'>				
                    <div class="form-group">
                        <label>{{form.getLabel('konten_pertanyaan')}}</label>
                        <input type='text' name='konten_pertanyaan' class="form-control" value="{{t.getKonten()}}" placeholder="Masukkan Pertanyaan">
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

<div id="deletePertanyaanModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id='form-pertanyaan' action='pertanyaan' method='POST'>
                <div class="modal-header">						
                    <h4 class="modal-title">Hapus Pertanyaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">				
                    <input type='hidden' value='{{t.getId()}}' name='id_pertanyaan' id='id_pertanyaan'>	
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