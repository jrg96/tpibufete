<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tramites legales - bufete alvarado</title>
    <link href="{$base_url}bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="{$base_url}css/style.css" rel="stylesheet">
    <link href="{$base_url}font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
						<li><a class="font-big" href="/tpibufete/index.php/logout">Cerrar sesión</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		<!--/.container-fluid -->
		</div>
    </nav>

    <div class="container">
	
    <form action="/tpibufete/index.php/crearusuario/procesar" method="post">
        
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			
                {if $resultado_operacion neq 'ninguna'}
				<div class="alert alert-success">
					<strong>{$resultado_operacion}</strong> {$mensaje_operacion}
				</div>
				{/if}
                        
				<!--Panel de inicio de sesion-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center class="panel-title">
							Crear usuario
						</center>
					</div>
					
					<br />
					
					<div class="panel-body">
					    <div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-user fa-3x"></i>
									</div>
									<div class="col-xs-11">
									    <input type="text" class="form-control input-lg" 
                                               placeholder="example@email.com" id="txtEmail" name="txtEmail"
                                               data-toggle="tooltip" data-placement="right" title="Escribe un correo valido ej: ejemplo@gmail.com" />
									</div>
								</div>
								
								<br />
								
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-user fa-3x"></i>
									</div>
									<div class="col-xs-11">
									    <input type="text" class="form-control input-lg" 
                                               placeholder="Nombre persona" id="txtNombre" name="txtNombre"
                                               data-toggle="tooltip" data-placement="right" title="Escribe su nonbre completo" />
									</div>
								</div>
								
								<br />
								
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-lock fa-3x"></i>
									</div>
									<div class="col-xs-11">
									    <input type="password" class="form-control input-lg" placeholder="Contraseña" id="txtContrasenia" name="txtContrasenia"
                                        data-toggle="tooltip" data-placement="right" title="La contraseña debe estar entre 5-20 caracteres"/>
									</div>
								</div>
								
								<br />
								
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-check fa-3x"></i>
									</div>
									<div class="col-xs-11">
									    <input type="password" class="form-control input-lg" placeholder="Repetir Contraseña" id="txtRepetir" name="txtRepetir"/>
									</div>
								</div>
								
								<br />
								
								<div class="row">
								    <div class="col-xs-1">
									    <i class="fa fa-check fa-3x"></i>
									</div>
									<div class="col-xs-11">
										<label for="sel1">Tipo usuario:</label>
									    <select class="form-control" id="tipo_usuario" name="tipo_usuario">
											<option value="user">Usuario común</option>
											<option value="emp">Empleado bufete (abogado)</option>
											<option value="admin">Administrador</option>
										</select> 
									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
					
					<br />
					<br />
					
					<div class="panel-footer no-vertical-padding">
					    <div class="row">
						    <div class="col-xs-12 side-padding-zero">
							    <input type="submit" class="btn btn-success btn-block btn-lg no-rounded-corner" value="Registrarse"></input>
							</div>
						</div>
					</div>
				</div>
				<!--Panel de inicio de sesion-->
			</div>
			<div class="col-md-2"></div>
		</div>
		
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Usuarios registrados</div>
					<div class="panel-body">
						<table class="table">
                            <thead>
                                <tr>
                                    <th><center>email</center></th>
                                    <th><center>nombre</center></th>
                                    <th><center>tipo</center></th>
									<th><center>Modificar</center></th>
									<th><center>Eliminar</center></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                {foreach item=usuario from=$usuarios}
                                <tr>
                                    <th><center>{$usuario.email}</center></th>
                                    <th><center>{$usuario.nombre_completo}</center></th>
                                    <th><center>{$usuario.tipo}</center></th>
									<th><center><a href="/tpibufete/index.php/editarusuario/index/{$usuario.id_usuario}">Modificar</a></center></th>
									<th><center><center><a href="/tpibufete/index.php/eliminarusuario/index/{$usuario.id_usuario}">Eliminar</a></center></center></th>
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</div>
		
    </form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/tether.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                animated : 'fade',
                container: 'body'
            });   
        });
    </script>    
  </body>
</html>