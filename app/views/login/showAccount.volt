{% extends "layouts\base.volt" %}

{% block title %}Profil Operator{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="row-centered">
	<div class="card login-card">
        <img class="avatar" src={{data.getFoto()}}>
		<h1 class="text-center text-secondary profil">Profil <span class="text-danger">Operator</span></h1>
        <h1 class="text-center text-secondary profil"><span class="text-primary">.:{{data.getUsername()}}:.</span></h1>
        <div class="row" style="margin-left:10vw;">
            <div class="col-md-6">
                <label>Nama Lengkap</label>
                <p>{{data.getNamaAdmin()}}</p>
                <label>Alamat Tempat Tinggal</label>
                <p>{{data.getAlamat()}}</p>
            </div>
            <div class="col-md-6">
                <label>Jabatan</label>
                <p>{{data.getJabatan()}}</p>
                <label>Pendidikan Terakhir</label>
                <p>{{data.getPendidikan()}}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="#editProfilModal" class="btn btn-success" data-toggle="modal"><i class="fa fa-pencil" data-toggle="tooltip" title="Ubah"><b>Ubah Profil</b></i></a>
        </div>
	</div>
</div>

<div id="editProfilModal" class="modal fade">
    <div class="modal-dialog modal-custom">
        <div class="modal-content">
            <form id='form-admin' action='admin/ubah' method='post' enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Ubah Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="height:50vh; overflow-y:auto;">
                    <input type="hidden" name="id_admin" id="id_admin" value="{{data.getId()}}">					
                    <div class="form-group">
                        <label><b>{{form.getLabel('nama_admin')}}</b></label>
                        {{form.render('nama_admin')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('alamat')}}</b></label>
                        {{form.render('alamat')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('jabatan')}}</b></label>
                        {{form.render('jabatan')}}
                    </div>
                    <p><b>Jenis Kelamin</b></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{form.render('P')}}
                                <label>{{form.getLabel('P')}}</label> 
                            </div>	
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{form.render('L')}}
                                <label>{{form.getLabel('L')}}</label>
                            </div>	
                        </div>
                    </div>
                    <p><b>Pendidikan Terakhir</b></p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{form.render('SMA')}}
                                <label>{{form.getLabel('SMA')}}</label>
                            </div>
                            <div class="form-group">
                                {{form.render('D1/D3/D4')}}
                                <label>{{form.getLabel('D1/D3/D4')}}</label>
                            </div>	
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{form.render('S1')}}
                                <label>{{form.getLabel('S1')}}</label>
                            </div>
                            <div class="form-group">
                                {{form.render('S2/S3')}}
                                <label>{{form.getLabel('S2/S3')}}</label>  
                            </div>	
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('username')}}</b></label>
                        {{form.render('username')}}
                    </div>
                    <div class="form-group">
                        <label><b>{{form.getLabel('password')}}</b></label>
                        {{form.render('password')}}
                    </div>
                    <div class="form-group">
                        <label for="foto_profil"><b>{{form.getLabel('foto_profil')}}</b></label>
                        {{form.render('foto_profil')}}
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