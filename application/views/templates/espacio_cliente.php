<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema gestor de encuestas</title>
    <link href="{$base_url}bootstrap/css/bootstrap.css" rel="stylesheet">
  </head>

  <body>
	<!-- Barra de navegacion de sistema gestor -->
	<nav class="navbar navbar-inverse navbar-fixed-top navbar-md">
		<div class="container">
		    <div class="container-fluid">
		        <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-left navbar-brand navbar-logo" href="index.html">
						<img src="" alt="Dispute Bills">
						<a class="navbar-brand font-big" href="#">MiEncuesta</a>
					</a>
		        </div>
				
				<div id="navbar1" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a class="font-big" href="/tpibufete/index.php/espaciousuario/index">Inicio</a></li>
						<li><a class="font-big" href="/tpibufete/index.php/logout/index">Cerrar sesion</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		<!--/.container-fluid -->
		</div>
    </nav>
	
	<br />
	<br />
	<br />
	<br />
	
	<div class="container">
		<div class="row">
			<h4> Buenos días {$nombre_usuario}</h4>
			<br />
			<center><h4>Deseas saber más sobre nosotros u obtener asesoría pre jurídica gratuita?</h4></center>
			<div class="col-sm-12 side-padding-zero">
                <a href="/tpibufete/index.php/chatgeneral" class="btn btn-success btn-block btn-lg no-rounded-corner">Haz click aquí</a>
            </div>
		</div>
		
		<br />
		<div class="row">
			<div class="col-xs-8">
				<h4>Asesorias</h4>
			</div>
			<div class="col-xs-4">
				<a href="/tpibufete/index.php/crearcaso/index" class="btn btn-success btn-block btn-lg no-rounded-corner">Crear nueva asesoría</a>
			</div>
		</div>
		
		{foreach item=caso from=$casos}
		<br />
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading">{$caso.nombre_caso}</div>
				<div class="panel-body">
					<div class="col-xs-8">
						<b> Estado: {$caso.estado}</b>
						<br />
						<b> Atendido por: {$caso.atendido_por}</b>
					</div>
					<div class="col-xs-4">
						<a href="/tpibufete/index.php/asesoriacaso/index/{$caso.id_caso}" class="btn btn-primary btn-block btn-lg no-rounded-corner">Consultar</a>
					</div>
				</div>
			</div>
		</div>
		{/foreach}
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$base_url}js/jquery-3.2.1.min.js"></script>
    <script src="{$base_url}bootstrap/js/bootstrap.js"></script>
  </body>
</html>