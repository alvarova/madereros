<?php
/* Smarty version 3.1.36, created on 2020-06-22 02:20:36
  from 'C:\xampp\htdocs\madereros\views\taskbar.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eeff9540b7102_89170925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '110ef5403da5cc526ebe7ef80018d6d76506e6c9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\taskbar.xhtml',
      1 => 1592785226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeff9540b7102_89170925 (Smarty_Internal_Template $_smarty_tpl) {
?>				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Inicio</li>
						<li class="breadcrumb-item active">Tareas</li>
					</ol>

					<ul class="app-actions">
						<li>
							<a href="#" id="fechahoy">
								Fecha <?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
	
							</a>
						</li>
						<li>
							<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
								<i class="icon-print"></i>
							</a>
						</li>
						<li>
							<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
								<i class="icon-cloud_download"></i>
							</a>
						</li>
					</ul>
				</div><?php }
}
