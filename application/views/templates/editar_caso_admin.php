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
						<li class="active"><a class="font-big" href="/tpibufete/index.php/espacioadministrador/index/Pendiente">Inicio</a></li>
						<li><a class="font-big" href="/tpibufete/index.php/logout/index">Cerrar sesión</a></li>
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
		{if $resultado_operacion neq 'ninguna'}
            <div class="alert alert-success">
                <strong>{$resultado_operacion}</strong> {$mensaje_operacion}
            </div>
        {/if}

		<div class="row">
			<div class="col-xs-12">
				<form action="/tpibufete/index.php/editarcasoadmin/procesarestado" method="POST">
                <input type="hidden" name="id_caso" id="id_caso" value="{$caso.id_caso}">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar estado</div>
                    <div class="panel-body">
						
						<div class="form-group">
                            <label for="id_cuenta">Nombre del caso:</label>
                            <input type="text" class="form-control" id="nombre_caso" name="nombre_caso" value = "{$caso.nombre_caso}">
                        </div>
						
						<label class="radio-inline"><input type="radio" name="estado_caso" value="Abierto">Abierto</label>
						<label class="radio-inline"><input type="radio" name="estado_caso" value="Cerrado">Cerrado</label>
                        <br />
						
						<div class="form-group">
							<label for="usr">Atendido por:</label>
							<select class="form-control" id="atendido_por" name="atendido_por">
								{foreach item=abogado from=$abogados}
								<option value="{$abogado.id_usuario}">{$abogado.nombre_completo}</option>
								{/foreach}
							</select>
						</div>
						
						<button type="submit" class="btn btn-success">Editar estado</input>
                    </div>
                </div>
				</form>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<form action="/tpibufete/index.php/editarcasoadmin/procesarpago" method="POST">
                <input type="hidden" name="id_caso" id="id_caso" value="{$caso.id_caso}">
                <div class="panel panel-primary">
                    <div class="panel-heading">Pagos</div>
                    <div class="panel-body">
						<div class="form-group">
							<label for="usr">Monto:</label>
							<input type="text" class="form-control" id="monto" name="monto" value="">
						</div>
						
						<div class="form-group">
							<label for="usr">Servicio:</label>
							<input type="text" class="form-control" id="item_cargado" name="item_cargado" value="">
						</div>
						
						<div class="form-group">
							<label for="usr">Descripcion de pago:</label>
							<textarea class="form-control" rows="5" id="razon_pago" name="razon_pago"></textarea>
						</div>
						
						<button type="submit" class="btn btn-success">Crear pago</button>
						
						<br />
						<table class="table">
                            <thead>
                                <tr>
                                    <th><center>id pago</center></th>
                                    <th><center>Servicio</center></th>
                                    <th><center>Descripcion</center></th>
									<th><center>Estado</center></th>
									<th><center>Eliminar</center></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                {foreach item=pago from=$pagos}
                                <tr>
                                    <th><center>{$pago.id_pago}</center></th>
                                    <th><center>{$pago.nombre_servicio}</center></th>
                                    <th><center>{$pago.descripcion_pago}</center></th>
									<th><center>{$pago.estado_pago}</center></th>
									<th><center>Eliminar</center></th>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
				</form>
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