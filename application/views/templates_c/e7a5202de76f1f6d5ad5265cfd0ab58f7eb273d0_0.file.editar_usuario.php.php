<?php
/* Smarty version 3.1.30, created on 2017-11-28 00:40:36
  from "H:\tpi\USBWebserver v8.6\root\tpibufete\application\views\templates\editar_usuario.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1cb0840e7454_06651651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7a5202de76f1f6d5ad5265cfd0ab58f7eb273d0' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpibufete\\application\\views\\templates\\editar_usuario.php',
      1 => 1511826992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1cb0840e7454_06651651 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tramites legales - bufete alvarado</title>
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
	
    <form action="/tpibufete/index.php/editarusuario/procesar" method="post">
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id_usuario'];?>
" />
        
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			
                <?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
				<div class="alert alert-success">
					<strong><?php echo $_smarty_tpl->tpl_vars['resultado_operacion']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>

				</div>
				<?php }?>
                        
				<!--Panel de inicio de sesion-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center class="panel-title">
							Editar usuario
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
                                               data-toggle="tooltip" data-placement="right" title="Escribe un correo valido ej: ejemplo@gmail.com" 
											   value = "<?php echo $_smarty_tpl->tpl_vars['usuario']->value['email'];?>
" disabled />
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
                                               data-toggle="tooltip" data-placement="right" title="Escribe su nonbre completo" 
											   value = "<?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre_completo'];?>
"/>
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
							    <input type="submit" class="btn btn-success btn-block btn-lg no-rounded-corner" value="Editar usuario"></input>
							</div>
						</div>
					</div>
				</div>
				<!--Panel de inicio de sesion-->
			</div>
			<div class="col-md-2"></div>
		</div>
    </form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/tether.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                animated : 'fade',
                container: 'body'
            });   
        });
    <?php echo '</script'; ?>
>    
  </body>
</html><?php }
}
