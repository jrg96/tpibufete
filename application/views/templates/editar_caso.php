<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tramites legales - bufete alvarado</title>
    <link href="{$base_url}bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="{$base_url}css/chat_style.css" rel="stylesheet">
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
		<br />
		<div class="row">
			<div class="col-md-12">
			
				<div class="panel panel-primary">
					<div class="panel-heading" id="accordion">
						<span class="glyphicon glyphicon-comment"></span> {$caso.nombre_caso}
					</div>
					<div class="panel-body panel-body-chat">
						<ul class="chat">
							{foreach item=mensaje from=$mensajes}
							{if $mensaje.id_usuario eq $id_usuario}
							<li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">{$mensaje.nombre_completo|escape:"htmlall"}</strong> <small class="pull-right text-muted">
										<span class="glyphicon glyphicon-time"></span>{$mensaje.fecha_creacion|escape:"htmlall"}</small>
									</div>
									<p>
										{if $mensaje.es_mensaje_archivo eq 'F'}
											{$mensaje.texto_mensaje|escape:"htmlall"}
										{else}
											<a href="/tpibufete/documentos_subidos/{$mensaje.nombre_archivo_encriptado}">Descargar {$mensaje.nombre_archivo_original|escape:"htmlall"}</a>
										{/if}
									</p>
								</div>
							</li>
							{else}
							<li class="right clearfix">
								<span class="chat-img pull-right">
									<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>{$mensaje.fecha_creacion|escape:"htmlall"}</small>
										<strong class="pull-right primary-font">{$mensaje.nombre_completo|escape:"htmlall"}</strong>
									</div>
									<p>
										{if $mensaje.es_mensaje_archivo eq 'F'}
											{$mensaje.texto_mensaje|escape:"htmlall"}
										{else}
											<a href="/tpibufete/documentos_subidos/{$mensaje.nombre_archivo_encriptado}">Descargar {$mensaje.nombre_archivo_original|escape:"htmlall"}</a>
										{/if}
									</p>
								</div>
							</li>
							{/if}
							{/foreach}
						</ul>
					</div>
					<div class="panel-footer">
						<form action="/tpibufete/index.php/atendercaso/procesarmensaje" method="POST">
						<div class="input-group">
							<input type="hidden" name="id_caso" id="id_caso" value="{$caso.id_caso}" />
							<input id="btn-input" type="text" class="form-control input-sm" placeholder="Escriba su mensaje aqui..." name="texto_mensaje" id="texto_mensaje" />
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="btn-chat">
								Enviar</button>
							</span>
						</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Subir archivos</div>
					<div class="panel-body">
						<form action="/tpibufete/index.php/atendercaso/procesararchivo" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_caso" id="id_caso" value="{$caso.id_caso}" />
							<input type="file" name="archivo_a_subir" size="512000" />
							<br />
							<span class="input-group-btn">
								<button class="btn btn-warning" id="">Enviar</button>
							</span>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<form action="/tpibufete/index.php/atendercaso/procesarpago" method="POST">
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
									<th><center><a href="/tpibufete/index.php/eliminarpagoemp/index/{$pago.id_pago}">Eliminar</a></center></th>
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