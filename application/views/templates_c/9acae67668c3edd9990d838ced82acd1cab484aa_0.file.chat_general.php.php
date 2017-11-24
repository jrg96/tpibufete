<?php
/* Smarty version 3.1.30, created on 2017-11-22 23:58:05
  from "H:\tpi\USBWebserver v8.6\root\tpibufete\application\views\templates\chat_general.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a160f0d68a365_98553475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9acae67668c3edd9990d838ced82acd1cab484aa' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpibufete\\application\\views\\templates\\chat_general.php',
      1 => 1511394762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a160f0d68a365_98553475 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema gestor de encuestas</title>
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
css/chat_style.css" rel="stylesheet">
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
						<span class="glyphicon glyphicon-comment"></span> <?php echo $_smarty_tpl->tpl_vars['caso']->value['nombre_caso'];?>

					</div>
					<div class="panel-body">
						<ul class="chat">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mensajes']->value, 'mensaje');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mensaje']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['mensaje']->value['id_usuario'] == $_smarty_tpl->tpl_vars['id_usuario']->value) {?>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value['nombre_completo'];?>
</strong> <small class="pull-right text-muted">
										<span class="glyphicon glyphicon-time"></span><?php echo $_smarty_tpl->tpl_vars['mensaje']->value['fecha_creacion'];?>
</small>
									</div>
									<p>
										<?php echo $_smarty_tpl->tpl_vars['mensaje']->value['texto_mensaje'];?>

									</p>
								</div>
							</li>
							<?php } else { ?>
							<li class="right clearfix">
								<span class="chat-img pull-right">
									<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $_smarty_tpl->tpl_vars['mensaje']->value['fecha_creacion'];?>
</small>
										<strong class="pull-right primary-font"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value['nombre_completo'];?>
</strong>
									</div>
									<p>
										<?php echo $_smarty_tpl->tpl_vars['mensaje']->value['texto_mensaje'];?>

									</p>
								</div>
							</li>
							<?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
					</div>
					<div class="panel-footer">
						<form action="/tpibufete/index.php/chatgeneral/procesarmensaje" method="POST">
						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-sm" placeholder="Escriba su mensaje aqui" name="texto_mensaje" id="texto_mensaje" />
							<span class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="btn-chat">Enviar</button>
							</span>
						</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
