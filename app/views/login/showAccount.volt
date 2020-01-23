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
	</div>
</div>

{% endblock %}