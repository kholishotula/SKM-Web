{% extends "layouts\base.volt" %}

{% block title %}Admin - Daftar LaporanRekap{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class='edit-box' style="width:50vw;height:50vw;">

{{ form.startForm() }}
    <label  for='judul_laporan'>{{form.getLabel('judul_laporan')}} </label>
    {{ form.render('judul_laporan') }}
{{ form.endForm() }}
</div>

{% endblock %}