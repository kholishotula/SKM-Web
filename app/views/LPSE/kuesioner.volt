{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Pengisian Kuesioner</span><br>
            LAYANAN PENGADAAN SECARA ELEKTRONIK (LPSE)</h1>
            <hr id="line">

            <br><br>
            <div class="row">
                <form action="{{url('lpse/kuesioner')}}" method="post">
                <div class="col-md-10" style="font-size: larger">
                    {% set i = 1 %}
                        {% for tanya in pertanyaan %}
                        {% set var = "poin" ~ i %}
                        <div class="form-group">
                            <label>{{tanya.getKonten()}}</label><br>
                            <input type="radio" name="{{var}}" value=4>Sangat Setuju</input>
                            <input type="radio" name="{{var}}" value=3>Setuju</input>
                            <input type="radio" name="{{var}}" value=2>Kurang Setuju</input>
                            <input type="radio" name="{{var}}" value=1>Tidak Setuju</input>
                        </div>
                        {% set i = i + 1 %}
                        {% endfor %}
                        <div class="form-group">
                            <label>Kritik dan Saran</label>
                            <textarea class="form-control" rows="5" name="kritik"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div style="margin-left:50px;">
                </div>
                </form>
            </div>
        </div>
    </main>
</div>
{% endblock %}
