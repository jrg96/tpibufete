<?php
/* Smarty version 3.1.30, created on 2017-11-15 14:07:08
  from "E:\tpi\USBWebserver v8.6\root\tpiencuesta\application\views\templates\inicio.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a0c4a0c97eec4_58331376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c32d437ac3dee827b99218382a00e77af6c7cac' => 
    array (
      0 => 'E:\\tpi\\USBWebserver v8.6\\root\\tpiencuesta\\application\\views\\templates\\inicio.php',
      1 => 1510754818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0c4a0c97eec4_58331376 (Smarty_Internal_Template $_smarty_tpl) {
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
css/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
font-awesome/css/font-awesome.css" rel="stylesheet">
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
						<li class="active"><a class="font-big" href="/miencuesta/">Inicio</a></li>
						<li><a class="font-big" href="/miencuesta/login/">Iniciar sesión</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		<!--/.container-fluid -->
		</div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
            </div>
            
            <div class="col-md-8">
                <div class="row">
                    <center><h2>MiEncuesta - Sistema gestor de encuestas</h2></center>
                    <br />
                </div>
                <div class="row vertical-center">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-sign-in fa-5x"></i>
                    </div>
                    <div class="col-md-5">
                        <a href="/miencuesta/login" class="btn btn-primary btn-block btn-lg no-rounded-corner">Iniciar Sesión</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                
                <div class="row vertical-center">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-md-5">
                        <a href="/miencuesta/registro" class="btn btn-primary btn-block btn-lg no-rounded-corner">Registrarse</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
            
            <div class="col-md-2">
            </div>
        </div>
    </div><!-- /.container -->


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
