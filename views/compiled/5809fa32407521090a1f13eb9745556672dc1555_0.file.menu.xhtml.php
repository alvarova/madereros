<?php
/* Smarty version 3.1.36, created on 2020-07-02 00:46:00
  from 'C:\xampp\htdocs\madereros\views\menu.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5efd12289a30b9_36141665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5809fa32407521090a1f13eb9745556672dc1555' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\menu.xhtml',
      1 => 1593643554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:taskbar.xhtml' => 1,
  ),
),false)) {
function content_5efd12289a30b9_36141665 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<!-- Container fluid start -->
		<div class="container-fluid">

			<!-- Navigation start -->
			<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SOEIMAdminNavbar" aria-controls="SOEIMAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="SOEIMAdminNavbar">
					<ul class="navbar-nav">
						<li class="nav-item ">
							<a class="nav-link  <?php echo $_smarty_tpl->tpl_vars['inicialactive']->value;?>
 " href="./?acc=inicial" id="dashboardsDropdown" role="button" >
								<i class="icon-devices_other nav-icon"></i>
								Principal
							</a>
							
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['empresasactive']->value;?>
 " href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-domain nav-icon"></i>
								Empresas
							</a>
							<ul class="dropdown-menu" aria-labelledby="appsDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=empresas">Búsqueda</a>
								</li>
								<li>
									<a class="dropdown-item" href="tasks.html">Listado</a>
								</li>
								<li>
									<a class="dropdown-item" href="documents.html">Búsqueda Historial</a>
								</li>
								<li>
									<a class="dropdown-item" href="documents.html">Listado Historial</a>
								</li>
								<li>
									<a class="dropdown-item" href="./?acc=empresasficha">Ingreso de datos</a>
								</li>								
								
								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['empleadosactive']->value;?>
 " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
								Empleados
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=empleados">Consultas</a>
								</li>
								<li>
									<a class="dropdown-item" href="pricing.html">Modificaciones</a>
								</li>
								<li>
									<a class="dropdown-item" href="faq.html">Impresiones</a>
								</li>
								<li>
									<a class="dropdown-item" href="search-results.html">Informes</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['trabajointernoactive']->value;?>
" href="#" id="formsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-business_center nav-icon"></i>
								Trabajo Interno
							</a>
							<ul class="dropdown-menu" aria-labelledby="formsDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=prestamos">Ver </a>
								</li>
								<li>
									<a class="dropdown-item" href="bs-select.html">Documentos</a>
								</li>

								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="customDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Consultas
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
										<li>
											<a class="dropdown-item" href="contact.html">Vencidos</a>
										</li>
										<li>
											<a class="dropdown-item" href="contact2.html">Activos</a>
										</li>
										<li>
											<a class="dropdown-item" href="contact3.html">Solicitados</a>
										</li>

									</ul>
								</li>
								<li>
									<a class="dropdown-item" href="form-inputs.html">Informes</a>
								</li>

							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['ordenesactive']->value;?>
 " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-inbox nav-icon"></i>
								Ordenes
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=afiliados">Consultas</a>
								</li>
								<li>
									<a class="dropdown-item" href="pricing.html">Modificaciones</a>
								</li>
								<li>
									<a class="dropdown-item" href="faq.html">Impresiones</a>
								</li>
								<li>
									<a class="dropdown-item" href="search-results.html">Informes</a>
								</li>
<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="calendarsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Modificaciones
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
										<li>
											<a class="dropdown-item" href="calendar.html">Correcciones</a>
										</li>
										<li>
											<a class="dropdown-item" href="calendar-external-draggable.html">Bajas</a>
										</li>
									</ul>
								</li>								
							</ul>
						</li>
<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['recibosactive']->value;?>
 " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-playlist_add_check nav-icon"></i>
								Recibos
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=afiliados">Consultas</a>
								</li>
								<li>
									<a class="dropdown-item" href="pricing.html">Modificaciones</a>
								</li>
								<li>
									<a class="dropdown-item" href="faq.html">Impresiones</a>
								</li>
								<li>
									<a class="dropdown-item" href="search-results.html">Informes</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['bocaexpendioactive']->value;?>
 " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-archive1 nav-icon"></i>
								Boca de Expendio
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=afiliados">Consultas</a>
								</li>
								<li>
									<a class="dropdown-item" href="pricing.html">Modificaciones</a>
								</li>
								<li>
									<a class="dropdown-item" href="faq.html">Impresiones</a>
								</li>
								<li>
									<a class="dropdown-item" href="search-results.html">Informes</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['sobresactive']->value;?>
 " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-drafts nav-icon"></i>
								Sobres
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=afiliados">Consultas</a>
								</li>
								<li>
									<a class="dropdown-item" href="pricing.html">Modificaciones</a>
								</li>
								<li>
									<a class="dropdown-item" href="faq.html">Impresiones</a>
								</li>
								<li>
									<a class="dropdown-item" href="search-results.html">Informes</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['informaciongeneralactive']->value;?>
 " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-info-with-circle nav-icon"></i>
								Info.Gral.
							</a>
							<ul class="dropdown-menu" aria-labelledby="pagesDropdown">
								<li>
									<a class="dropdown-item" href="./?acc=afiliados">Consultas</a>
								</li>
								<li>
									<a class="dropdown-item" href="pricing.html">Modificaciones</a>
								</li>
								<li>
									<a class="dropdown-item" href="faq.html">Impresiones</a>
								</li>
								<li>
									<a class="dropdown-item" href="search-results.html">Informes</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle <?php echo $_smarty_tpl->tpl_vars['opcionesactive']->value;?>
 " href="#" id="uiElementsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-cog nav-icon"></i>
								Opciones
							</a>
							<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="uiElementsDropdown">
								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="buttonsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Importar/Exportar
									</a>
									<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="buttonsDropdown">
										<li class='open-left'>
											<a class="dropdown-item" href="buttons.html">Afiliados de XLS</a>
										</li>
										<li class='open-left'>
											<a class="dropdown-item" href="button-groups.html">Afiliados a XLS</a>
										</li>
										<li class='open-left'>
											<a class="dropdown-item" href="dropdowns.html">Deudores</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="navsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Parametros
									</a>
									<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="navsDropdown">
										<li class='open-left'>
											<a class="dropdown-item" href="./?acc=categoria">Categorias ABM</a>
										</li>
										<li class='open-left'>
											<a class="dropdown-item" href="./?acc=idiomas">Idiomas ABM</a>
										</li>
										<li class='open-left'>
											<a class="dropdown-item" href="./?acc=autores">Autores ABM</a>
										</li>
									</ul>
								</li>

								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="componentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Configuración
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="componentsDropdown">
										<li>
											<a class="dropdown-item" href="jumbotron.html">Sincronizar</a>
										</li>
										<li>
											<a class="dropdown-item" href="labels-badges.html">Ver volcado</a>
										</li>
										
										<li>
											<a class="dropdown-item" href="spinners.html">Gestionar USR</a>
										</li>
									</ul>
								</li>
								
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- Navigation end -->





			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Taskbar header start -->

					<?php $_smarty_tpl->_subTemplateRender("file:taskbar.xhtml", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<!-- taskbar header end -->

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['cuerpo']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				</div>
				<!-- Content wrapper end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

			<!-- Footer start -->
			<footer class="main-footer">© SOEIM 2020</footer>
			<!-- Footer end -->

		</div>
		<!-- Container fluid end --><?php }
}
