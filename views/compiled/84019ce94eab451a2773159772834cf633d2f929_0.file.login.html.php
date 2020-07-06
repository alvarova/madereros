<?php
/* Smarty version 3.1.36, created on 2020-06-08 22:50:29
  from 'C:\wamp64\www\base\views\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5edec0b5c21957_93587907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84019ce94eab451a2773159772834cf633d2f929' => 
    array (
      0 => 'C:\\wamp64\\www\\base\\views\\login.html',
      1 => 1591656625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edec0b5c21957_93587907 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="es">

	

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="SOEIM Admin V0.1">
		<meta name="author" content="OpcionesDesign">
		<link rel="shortcut icon" href="assets/img/fav.png" />

		<!-- Title -->
		<title>SOEIM Admin - Login</title>
		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="assets/css/main.css" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			
			<form action="./" method="POST">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									<img src="assets/img/logo-soeim.png" alt="SOEIM Admin V0.1" />
								</a>
								<h5>Bienvenido,<br />Por favor, identifiquese.</h5>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Email Address" name="login" />
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="password"/>
								</div>
								<div class="actions mb-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="remember_pwd">
										<label class="custom-control-label" for="remember_pwd">Recordarme</label>
									</div>
									<button type="submit" name='enter' class="btn btn-primary">Ingresar</button>
								</div>
								<div class="forgot-pwd">
									<a class="link" href="forgot-pwd.html"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
 Recuperar contraseña</a>
									
								</div>
								<hr>
								<div class="actions align-left">
									<span class="additional-link">Usuario nuevo</span>
									<a href="signup.html" class="btn btn-dark">Solicitar cuenta</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>


</html><?php }
}
