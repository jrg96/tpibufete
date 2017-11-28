<?php
/* Smarty version 3.1.30, created on 2017-11-28 00:00:50
  from "H:\tpi\USBWebserver v8.6\root\tpibufete\application\views\templates\lista_nuevos_mensajes.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1ca7327680d4_63328493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0365137da07a9469ffbc25aa838add06a3de741' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpibufete\\application\\views\\templates\\lista_nuevos_mensajes.php',
      1 => 1511827032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1ca7327680d4_63328493 (Smarty_Internal_Template $_smarty_tpl) {
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
						<li class="active"><a class="font-big" href="/tpibufete/index.php/espacioempleado/index">Inicio</a></li>
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
			<h4> Buenos días <?php echo $_smarty_tpl->tpl_vars['nombre_usuario']->value;?>
</h4>
			<br />
		</div>
		
		<br />
		<div class="row">
			<div class="col-xs-3">
				<h3>Nuevos mensajes generales</h3>
			</div>
			<div class="col-xs-3">
				<a href="/tpibufete/index.php/espacioempleado/index/Abierto" class="btn btn-success btn-block btn-lg no-rounded-corner">Ver asesorias abiertas</a>
			</div>
			<div class="col-xs-3">
				<a href="/tpibufete/index.php/espacioempleado/index/Cerrado" class="btn btn-success btn-block btn-lg no-rounded-corner">Ver asesorias cerradas</a>
			</div>
			<div class="col-xs-3">
				<a href="/tpibufete/index.php/listamensajes/index" class="btn btn-success btn-block btn-lg no-rounded-corner">Nuevos mensajes generales</a>
			</div>
		</div>
		
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nuevos_mensajes']->value, 'mensaje');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mensaje']->value) {
?>
		<br />
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value['nombre_completo'];?>
</div>
				<div class="panel-body">
					<div class="col-xs-8">
						<b> Usuario: <?php echo $_smarty_tpl->tpl_vars['mensaje']->value['email'];?>
</b>
						<br />
						<b> Estado: <?php echo $_smarty_tpl->tpl_vars['mensaje']->value['estado'];?>
</b>
					</div>
					<div class="col-xs-4">
						<a href="/tpibufete/index.php/chatusuario/index/<?php echo $_smarty_tpl->tpl_vars['mensaje']->value['id_chat_general'];?>
" class="btn btn-primary btn-block btn-lg no-rounded-corner">Consultar</a>
					</div>
				</div>
			</div>
		</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
