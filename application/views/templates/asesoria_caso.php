<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema gestor de encuestas</title>
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
						<img src="" alt="Dispute Bills">
						<a class="navbar-brand font-big" href="#">MiEncuesta</a>
					</a>
		        </div>
				
				<div id="navbar1" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a class="font-big" href="/tpibufete/index.php/espaciousuario/index">Inicio</a></li>
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
		<div class="row">
			<div class="col-md-12">
			
				<div class="panel panel-primary">
					<div class="panel-heading" id="accordion">
						<span class="glyphicon glyphicon-comment"></span> {$caso.nombre_caso}
					</div>
					<div class="panel-body panel-body-chat">
						<ul class="chat">
							{if $puede_ver_contenido}
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
							{else}
								<li class="right clearfix">
									<span class="chat-img pull-right">
										<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
									</span>
									<div class="chat-body clearfix">
										<div class="header">
											<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>Hace unos min</small>
											<strong class="pull-right primary-font">Bufete Alvarado</strong>
										</div>
										<p>
											Para poder continuar visualizando el contenido de este caso, por favor debe realizar los pagos pendientes primero
										</p>
									</div>
								</li>
							{/if}
						</ul>
					</div>
					<div class="panel-footer">
						{if $caso.estado eq 'Pendiente'}
							<h4>No puede enviar mensajes hasta que se apruebe su caso</h4>
						{else}
						<form action="/tpibufete/index.php/asesoriacaso/procesarmensaje" method="POST">
						<div class="input-group">
							<input type="hidden" name="id_caso" id="id_caso" value="{$caso.id_caso}" />
							<input id="btn-input" type="text" class="form-control input-sm" placeholder="Escriba su mensaje aqui" name="texto_mensaje" id="texto_mensaje" />
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="btn-chat">Enviar</button>
							</span>
						</div>
						</form>
						{/if}
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Subir archivos</div>
					<div class="panel-body">
						<form action="/tpibufete/index.php/asesoriacaso/procesararchivo" method="post" enctype="multipart/form-data">
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
			<div class="col">
				<div class="panel panel-primary">
                    <div class="panel-heading">Pagos</div>
                    <div class="panel-body">
						<table class="table">
                            <thead>
                                <tr>
                                    <th><center>id pago</center></th>
                                    <th><center>Servicio</center></th>
                                    <th><center>Descripcion</center></th>
									<th><center>Monto</center></th>
									<th><center>Estado</center></th>
									<th><center>Pagar</center></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                {foreach item=pago from=$pagos}
                                <tr>
                                    <th><center>{$pago.pago.id_pago}</center></th>
                                    <th><center>{$pago.pago.nombre_servicio}</center></th>
                                    <th><center>{$pago.pago.descripcion_pago}</center></th>
									<th><center>{$pago.pago.monto}</center></th>
									<th><center>{$pago.pago.estado_pago}</center></th>
									{if $pago.link eq 'none'}
									<th><center> - </center></th>
									{else}
									<th><center><a href="{$pago.link}">Pagar</a></center></th>
									{/if}
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