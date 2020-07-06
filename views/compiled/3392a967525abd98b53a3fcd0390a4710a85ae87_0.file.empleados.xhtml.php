<?php
/* Smarty version 3.1.36, created on 2020-07-03 21:47:48
  from 'C:\xampp\htdocs\madereros\views\empleados.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eff8b6490ba77_99904208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3392a967525abd98b53a3fcd0390a4710a85ae87' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\empleados.xhtml',
      1 => 1593804970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eff8b6490ba77_99904208 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row gutters">
<div class="col-4" style="float:right;"><span class="badge badge-pill badge-danger col-1" id="shBusqueda" >[-]</span></div>
	<form id="consultaForm" name="consultaForm" action="index.php" method="post" class="col-12">
										<div class="col-xl-6 col-lglg-6 col-md-6 col-sm-12 col-12">
											<div class="form-group">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<button type="button" class="btn btn-dark">Consultas</button>
														<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name='tbusqueda' id='tbusqueda'>
															<span class="sr-only">Tipos de busqueda</span>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#" id="byDNICUIL">Activas por DNI/CUIL</a>
															<a class="dropdown-item" href="#" id="byAN">&nbsp;&nbsp;&nbsp;&nbsp;por Apellido/Nombre</a>
															<div role="separator" class="dropdown-divider"></div>
															<a class="dropdown-item" href="#" id="byDCH">Historial por DNI/CUIL</a>
															<a class="dropdown-item" href="#" id="byANH">&nbsp;&nbsp;&nbsp;&nbsp;por Apellido/Nombre</a>
														</div>
													</div>
													<input type="text" class="form-control" aria-label="Text input with segmented dropdown button" id="busqueda" name="busqueda"> 
												</div>
											</div>
										</div>
										<div class="col-xl-6 col-lglg-6 col-md-6 col-sm-12 col-12">
											<input type="hidden" id="tipobusqueda" name="tipobusqueda" value="CUIL">
											<span class="badge badge-pill badge-info" id="tipobusquedaTXT" >Buscar por?</span>
											<input type="hidden" id="token" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
											<input type="hidden" id="acc" name="acc" value="<?php echo $_smarty_tpl->tpl_vars['acc']->value;?>
">
											<button type="button" id="submit" name="submit" class="btn btn-primary float-right">Consultar</button>
										</div>
	</form>

</div>

				<div class="table-container">
								<div class="t-header">Listado de Empleados</div>
								<div class="table-responsive">
									<table id="hideSearchExample" class="table table-hover table-bordered table-light m-0">
										<thead>
											<tr>
												<th class="no-sort">Documento</th>
												<th class="no-sort">CUIL</th>
												<th class="no-sort">Apellido</th>
												<th class="no-sort">Nombre</th>
												<th class="no-sort">Teléfono</th>
												<th class="no-sort">Domicilio</th>
												<th class="no-sort">Localidad</th>
												<th class="no-sort">Alta</th>
												<th class="no-sort">Acciones</th>
											</tr>
										</thead>
										<tbody id='tablaBusqueda'>
											<tr>
											  <td>Documento</td>
											  <td>CUIL</td>
											  <td>Apellido</td>
											  <td>Nombre</td>
											  <td>Telefono</td>
											  <td>Domicilio</td>
											  <td>Localidad</td>
											  <td>Alta</td>
											  <td>Acciones</td>
											</tr>
										</tbody>
									</table>
								</div>
				</div><?php }
}
