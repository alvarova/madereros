<?php
/* Smarty version 3.1.36, created on 2020-06-09 00:36:11
  from 'C:\wamp64\www\base\views\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eded97b54f658_11237095',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7e8ce56dcc52a9bbf048b1eb7d91d1c6e3e22b4' => 
    array (
      0 => 'C:\\wamp64\\www\\base\\views\\index.html',
      1 => 1591662962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.xhtml' => 1,
  ),
),false)) {
function content_5eded97b54f658_11237095 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">
		

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
">
		<meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['autor']->value;?>
">
		<link rel="shortcut icon" href="assets/img/fav.png" />

		<!-- Title -->
		<title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="assets/fonts/style.css">

		<!-- Main css -->
		<link rel="stylesheet" href="assets/css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="assets/vendor/daterange/daterange.css" />

		<!-- Chartist css -->
		<link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css" />
		<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css" />	

	</head>
	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Cargando...</span>
			</div>
		</div>
		<!-- Loading ends -->

<?php $_smarty_tpl->_subTemplateRender("file:header.xhtml", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['cuerpo']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/js/moment.js"><?php echo '</script'; ?>
>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<?php echo '<script'; ?>
 src="assets/vendor/slimscroll/slimscroll.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/slimscroll/custom-scrollbar.js"><?php echo '</script'; ?>
>

		<!-- Daterange -->
		<?php echo '<script'; ?>
 src="assets/vendor/daterange/daterange.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/daterange/custom-daterange.js"><?php echo '</script'; ?>
>

		<!-- Chartist JS -->
		<?php echo '<script'; ?>
 src="assets/vendor/chartist/js/chartist.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/chartist/js/chartist-tooltip.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/chartist/js/custom/threshold/threshold.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/chartist/js/custom/bar/bar-chart-orders.js"><?php echo '</script'; ?>
>

		<!-- jVector Maps -->
		<?php echo '<script'; ?>
 src="assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/jvectormap/world-mill-en.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/jvectormap/gdp-data.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="assets/vendor/jvectormap/custom/world-map-markers2.js"><?php echo '</script'; ?>
>

		<!-- Rating JS -->
		<?php echo '<script'; ?>
 src="assets/vendor/rating/raty.js"><?php echo '</script'; ?>
>	
		<?php echo '<script'; ?>
 src="assets/vendor/rating/raty-custom.js"><?php echo '</script'; ?>
>

		<!-- Main Js Required -->
		<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>

	</body>

</html><?php }
}
