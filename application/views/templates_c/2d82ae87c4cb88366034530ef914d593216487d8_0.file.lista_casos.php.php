<?php
/* Smarty version 3.1.30, created on 2017-11-20 15:39:26
  from "H:\tpi\USBWebserver v8.6\root\tpibufete\application\views\templates\lista_casos.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a12f72e254df8_47634594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d82ae87c4cb88366034530ef914d593216487d8' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpibufete\\application\\views\\templates\\lista_casos.php',
      1 => 1511192364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a12f72e254df8_47634594 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['casos']->value, 'caso');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['caso']->value) {
?>
                                <tr>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['caso']->value['nombre_caso'];?>
</center></th>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['caso']->value['nombre_completo'];?>
</center></th>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['caso']->value['estado'];?>
</center></th>
									<th><center><a href="/tpibufete/index.php/editarcasoadmin/index/<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_caso'];?>
">Modificar</a></center></th>
									<th><center>Eliminar</center></th>
                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
