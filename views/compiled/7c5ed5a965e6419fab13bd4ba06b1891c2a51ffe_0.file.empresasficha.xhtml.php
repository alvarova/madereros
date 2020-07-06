<?php
/* Smarty version 3.1.36, created on 2020-07-05 15:17:26
  from 'C:\xampp\htdocs\madereros\views\empresasficha.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f01d2e60a9d24_84886312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c5ed5a965e6419fab13bd4ba06b1891c2a51ffe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\empresasficha.xhtml',
      1 => 1593955042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f01d2e60a9d24_84886312 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row justify-content-center gutters">
						<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
							<form>
								<div class="card m-0">
									<div class="card-header">
										<div class="card-title">Ficha EMPRESAS</div>
										<ul class="text-muted custom">
											<li>* Es importante completar toda la información relativa a la empresa en detalle.</li>
											<li>* Evite ingresar datos sin verificar o repetidos.</li>
				
										</ul>
									</div>
									<div class="card-body">
										
										<div class="row gutters">
	
											<div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">
												<div class="docs-type-container">
													
													<div class="docTypeContainerScroll">
														<div class="docs-block">
															<h5>Tareas</h5>
															<div class="doc-labels">
																<a href="#" class="active">
																	<i class="icon-receipt"></i> Ficha
																</a>
																<a href="#">
																	<i class="icon-users"></i> Empleados
																</a>
																<a href="#">
																	<i class="icon-pie-chart1"></i> Aportes
																</a>
																<a href="#">
																	<i class="icon-layers2"></i> Deudas
																</a>
																<a href="#">
																	<i class="icon-slack"></i> Consultas
																</a>
																<a href="#">
																	<i class="icon-check-square"></i> Inspecciones
																</a>
																<a href="#">
																	<i class="icon-person_pin"></i> Recategorizacion
																</a>
																<a href="#">
																	<i class="icon-line-graph"></i> Ascensos
																</a>										
																<a href="#">
																	<i class="icon-folder"></i> Documentacion
																</a>																						
															</div>
														</div>
													</div>
												</div>
											</div>



											<div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
												<div class="form-group">
													<label for="razon_social" class="col-form-label">Razon Social</label>
													<input type="text" class="form-control" id="razon_social" placeholder="Razon social" value="<?php echo $_smarty_tpl->tpl_vars['razon_social']->value;?>
">
												</div>
												<div class="form-group">
													<label for="cuit" class="col-form-label">CUIT</label>
													<input type="text" class="form-control" id="cuit" placeholder="CUIT" value="<?php echo $_smarty_tpl->tpl_vars['cuit']->value;?>
">
												</div>
												
												<div class="form-group">
													<label for="domicilio" class="col-form-label">Domicilio</label>
													<input type="text" class="form-control" id="domicilio" placeholder="Calle N 1234" value="<?php echo $_smarty_tpl->tpl_vars['domicilio']->value;?>
">
												</div>
												
											 <div class="row" >
												<div class="form-group col">
													<label for="localidad" class="col-form-label">Localidad</label>
														<select class="form-control" id="localidad">	
															<?php echo $_smarty_tpl->tpl_vars['listaLocalidades']->value;?>

														</select>
												</div>
												<div class="form-group col">
													<label for="codigo_postal" class="col-form-label">Código Postal</label>
													<input type="text" class="form-control" id="codigo_postal" placeholder="3000" value="<?php echo $_smarty_tpl->tpl_vars['codigo_postal']->value;?>
">
												</div>
											 </div>														

											 <div class="form-group col" >
												<label class="label">Inicio de actividades</label>
												<div class="custom-date-input ">
													<input type="text" name="alta" id="fecha_inicio_actividad" class="datepicker form-control" data-value="<?php echo $_smarty_tpl->tpl_vars['fecha_inicio_actividad']->value;?>
" >
												</div>
											</div>

												<div class="form-group">
													<label for="rama_empresa" class="col-form-label">Sector/Especialidad</label>
														<select class="form-control" id="rama_empresa" name="rama_empresa">
															<?php echo $_smarty_tpl->tpl_vars['listaRamas']->value;?>

														</select>
												</div>

												<div class="form-group">
													<label for="telefono" class="col-form-label">Telefono</label>
													<input type="text" class="form-control" id="telefono" placeholder="0342-4550000" value="<?php echo $_smarty_tpl->tpl_vars['telefono']->value;?>
">
												</div>
												<div class="form-group">
													<label for="correo_electronico" class="col-form-label">Email</label>
													<input type="text" class="form-control" id="correo_electronico" placeholder="correo@direcionemail.com" value="<?php echo $_smarty_tpl->tpl_vars['correo_electronico']->value;?>
">
												</div>
												<div class="form-group justify-content-end">
													<button type="button" class="btn btn-primary">
														Cantidad de empleados <span class="badge badge-pill badge-white"><?php echo $_smarty_tpl->tpl_vars['cantidad_empleados']->value;?>
</span>
														<span class="sr-only">empleados</span>
													</button>
												</div>
												<div class="row" >
													<div class="form-group col" >
														<label class="label">Alta de empresa</label>
														<div class="custom-date-input ">
															<input type="text" name="fecha_alta" id="fecha_alta" class="datepicker form-control" data-value="<?php echo $_smarty_tpl->tpl_vars['fecha_alta']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['fecha_alta']->value;?>
" >
														</div>
													</div>
													
													<div class="form-group col" >
															<label class="label">Fecha de baja</label>
															<div class="custom-date-input ">
																<input type="text" name="fecha_baja" id="fecha_baja" class="datepicker form-control" data-value="<?php echo $_smarty_tpl->tpl_vars['fecha_baja']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['fecha_baja']->value;?>
">
															</div>
													</div>
												</div>												
											</div>
																				
										
										
										</div>
										
										<div class="row gutters">

											<div class="btn-group ">
												<button type="button" id="submit" name="submit" class="btn btn-primary float-right">Guardar</button>
												<button type="button" class="btn btn-danger">Otras opciones</button>
												<button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="sr-only">Empresa </span>
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#">Guardar cambios</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Eliminar empresa</a>
												</div>
											</div>
										</div>

									</div>
								</div>
							</form>
						</div>
					</div>

<?php }
}
