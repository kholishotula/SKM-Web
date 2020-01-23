{% extends "layouts\base.volt" %}

{% block title %}Admin -Tambah Kuesioner{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<form id='form-kuesioner' action='kuesioner/tambah' method='POST'>
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
</form>

{% endblock %}