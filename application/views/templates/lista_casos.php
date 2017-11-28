<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tramites legales - bufete alvarado</title>
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
						<a class="navbar-brand font-big" href="/tpibufete/index.php/inicio">Bufete Alvarado</a>
					</a>
		        </div>
				
				<div id="navbar1" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a class="font-big" href="/tpibufete/index.php/espacioadministrador/index">Inicio</a></li>
						<li><a class="font-big" href="/tpibufete/index.php/logout">Cerrar sesion</a></li>
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
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Lista de casos</div>
					<div class="panel-body">
						<table class="table">
                            <thead>
                                <tr>
                                    <th><center>Nombre caso</center></th>
                                    <th><center>Creado por</center></th>
                                    <th><center>Estado</center></th>
									<th><center>Modificar</center></th>
									<th><center>Eliminar</center></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                {foreach item=caso from=$casos}
                                <tr>
                                    <th><center>{$caso.nombre_caso}</center></th>
                                    <th><center>{$caso.nombre_completo}</center></th>
                                    <th><center>{$caso.estado}</center></th>
									<th><center><a href="/tpibufete/index.php/editarcasoadmin/index/{$caso.id_caso}">Modificar</a></center></th>
									<th><center><a href="/tpibufete/index.php/eliminarcaso/index/{$caso.id_caso}">Eliminar</a></center></th>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$base_url}js/jquery-3.2.1.min.js"></script>
    <script src="{$base_url}bootstrap/js/bootstrap.js"></script>
  </body>
</html>