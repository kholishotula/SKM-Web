<!DOCTYPE html>
<html>
<head>
	{% include 'layouts\header.volt' %}
	<title>{% block title %} {% endblock %}</title>
</head>
<body>
	{% include 'layouts\navbar.volt' %}

	{% block content %} {% endblock %}
	<div class="clearfix bottom-content">
		<div class="row" style="position: absolute; bottom: 8px; width: 100%; color: white"> 
			<div class="col-md-8">
				<p style="padding-left: 2vw;">© Dinas Komunikasi, Informatika, dan Statistik Kota Blitar</p>
			</div>
			<div class="col-md-4">
                <a type="button" class="text-white" href="http://diskominfotik.blitarkota.go.id/"><i class="fa fa-globe" style="font-size:24px"></i> http://diskominfotik.blitarkota.go.id</a><br>
                <a type="button" class="text-white" href="https://www.facebook.com/diskominfotikkotablitar/"><i class="fa fa-facebook-square" style="font-size:24px"></i> Diskominfotik Kota Blitar</a><br>
			</div>
		</div> 
	</div>
</body>
</html>