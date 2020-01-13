{% extends "layouts\base.volt" %}

{% block title %}Login Operator{% endblock %}

{% block content %}

{% if cookies.has('username') %}
	
{% endif %}

<div class="row-centered">
	<div class="card login-card">
		<h1 class="text-center text-secondary">Log In <span class="text-danger">Operator</span></h1>
		<div class="notif-block">
			{% if message != '' %}
				{{ this.flash.error(message)}}
			{% endif %}
		</div>
		<div class="col-md-6 login-padding">
			{{ form.startForm()}}
				<div class="form-group">
					{{form.render('username') }}
				</div>
				<div class="form-group">
					{{ form.render('password') }}
				</div>
				<div class="form-group">
				{{ form.render('Login') }}
				</div style="margin-left:50px;">
					{{ form.render('remember') }}
					{{ form.getLabel('remember') }}
				</div>
			{{ form.endForm() }}
		</div>
	</div>
</div>

{% endblock %}