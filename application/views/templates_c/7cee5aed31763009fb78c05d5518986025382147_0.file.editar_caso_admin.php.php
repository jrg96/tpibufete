<?php
/* Smarty version 3.1.30, created on 2017-11-20 15:17:58
  from "H:\tpi\USBWebserver v8.6\root\tpibufete\application\views\templates\editar_caso_admin.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a12f226230205_75954785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cee5aed31763009fb78c05d5518986025382147' => 
    array (
      0 => 'H:\\tpi\\USBWebserver v8.6\\root\\tpibufete\\application\\views\\templates\\editar_caso_admin.php',
      1 => 1511191060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a12f226230205_75954785 (Smarty_Internal_Template $_smarty_tpl) {
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
		<?php if ($_smarty_tpl->tpl_vars['resultado_operacion']->value != 'ninguna') {?>
            <div class="alert alert-success">
                <strong><?php echo $_smarty_tpl->tpl_vars['resultado_operacion']->value;?>
</strong> <?php echo $_smarty_tpl->tpl_vars['mensaje_operacion']->value;?>

            </div>
        <?php }?>

		<div class="row">
			<div class="col-xs-12">
				<form action="/tpibufete/index.php/editarcasoadmin/procesarestado" method="POST">
                <input type="hidden" name="id_caso" id="id_caso" value="<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_caso'];?>
">
                <div class="panel panel-primary">
                    <div class="panel-heading">Editar estado</div>
                    <div class="panel-body">
						
						<div class="form-group">
                            <label for="id_cuenta">Nombre del caso:</label>
                            <input type="text" class="form-control" id="nombre_caso" name="nombre_caso" value = "<?php echo $_smarty_tpl->tpl_vars['caso']->value['nombre_caso'];?>
">
                        </div>
						
						<label class="radio-inline"><input type="radio" name="estado_caso" value="Abierto">Abierto</label>
						<label class="radio-inline"><input type="radio" name="estado_caso" value="Cerrado">Cerrado</label>
                        <br />
						
						<div class="form-group">
							<label for="usr">Atendido por:</label>
							<select class="form-control" id="atendido_por" name="atendido_por">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['abogados']->value, 'abogado');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['abogado']->value) {
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['abogado']->value['id_usuario'];?>
"><?php echo $_smarty_tpl->tpl_vars['abogado']->value['nombre_completo'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
                <input type="hidden" name="id_caso" id="id_caso" value="<?php echo $_smarty_tpl->tpl_vars['caso']->value['id_caso'];?>
">
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
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagos']->value, 'pago');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pago']->value) {
?>
                                <tr>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['pago']->value['id_pago'];?>
</center></th>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['pago']->value['nombre_servicio'];?>
</center></th>
                                    <th><center><?php echo $_smarty_tpl->tpl_vars['pago']->value['descripcion_pago'];?>
</center></th>
									<th><center><?php echo $_smarty_tpl->tpl_vars['pago']->value['estado_pago'];?>
</center></th>
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
				</form>
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
