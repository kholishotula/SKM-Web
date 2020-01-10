<!DOCTYPE html>
<html>
<head>
	{% include 'layouts\header.volt' %}
	<title>{% block title %} {% endblock %}</title>
</head>
<body>
	{% include 'layouts\navbar.volt' %}

	{% block content %} {% endblock %}
	<div class="bg-info clearfix">
		<div></div>
		<div class="row"> 
			<p style="padding-left: 2vw">© Dinas Komunikasi, Informatika, dan Statistik Kota Blitar</p>
		</div> 
	</div>
</body>
</html>