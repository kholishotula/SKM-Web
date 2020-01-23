{% extends "layouts\base.volt" %}

{% block title %}Survei Kepuasan Layanan Masyarakat - Dinas Komunikasi, Informatika, dan Statistik Kota Blitar{% endblock %}

{% block content %}
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">
    <main id="main-container" style="padding-top: 0">
        <div class="content" style="padding-top: 0">
            <h1 class="text-center text-secondary"><span class="text-danger">Selamat Datang</span> 
            di Survei Kepuasan Layanan Masyarakat<br>Kota Blitar</h1>
            <hr id="line">

            <div class="row-center">
                {% if session.get('auth') %}
                <div class=style="width:400px; height:400px;">
                    <canvas id="myChart"></canvas>
                {% else %}
                <div id="demo" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="hover">
                    <ol class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img img-fluid img-responsive" src="{{url('assets/bg1.jpg')}}" alt="Dinas Komunikasi, Informatika, dan Statistika Kota Blitar">
                        </div>
                        <div class="carousel-item">
                            <img class="img img-fluid img-responsive" src="{{url('assets/bg2.jpg')}}" alt="LPSE">
                        </div>
                        <div class="carousel-item">
                            <img class="img img-fluid img-responsive" src="{{url('assets/bg3.jpg')}}" alt="PPID">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                {% endif %}
            </div>
            <br><br>
            <div class="row clearfix">
                <div class="col-8" style="padding-left: 10%">
                    <h4>Terima kasih telah menggunakan layanan Dinas Komunikasi, Informatika, dan Statistik Kota Blitar. Demi perbaikan kami ke depannya, silahkan isi survei kepuasan berikut.</h4>
                </div>
                <div class="col-4 text-center">
                    <a type="button" class="btn btn-lg btn-outline-dark myButton" href="{{url('panduan')}}">Panduan</a><br><br>
                    <a type="button" class="btn btn-lg btn-outline-dark" href="{{url('survei')}}">Isi Survei</a>
                </div>
            </div>
        </div>
    </main>
    {% if session.get('auth') %}
        <a href="#tambahAdminModal" class="tambah" data-toggle="modal"><button class="btn btn-primary btn-circle btn-lg add-admin-btn" data-toggle="tooltip" title="Tambah Operator"><i class="fa fa-user"></i></button></a>
    {% endif %}
</div>

{% if session.get('auth') %}
<div id="tambahAdminModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
             <form id="form-admin" action="tambah/operator" method="POST" enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Tambah Operator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="height:30vw; overflow-y:auto;">					
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
{% endif %}
{% endblock %}
