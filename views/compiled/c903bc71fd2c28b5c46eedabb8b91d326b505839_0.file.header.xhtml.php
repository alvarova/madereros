<?php
/* Smarty version 3.1.36, created on 2020-06-21 13:11:29
  from 'C:\xampp\htdocs\madereros\views\header.xhtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eef4061637766_95284372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c903bc71fd2c28b5c46eedabb8b91d326b505839' => 
    array (
      0 => 'C:\\xampp\\htdocs\\madereros\\views\\header.xhtml',
      1 => 1592147590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eef4061637766_95284372 (Smarty_Internal_Template $_smarty_tpl) {
?>		<!-- *************
			************ Header section start *************
		************* -->

		<!-- Header start -->
		<header class="header">
			<div class="logo-wrapper">
				<a href="index.html" class="logo">
					<img src="assets/img/logo.png" alt="Bancaria Admin" />
				</a>
				
				<!--  Load content in quick links
				<a href="#" class="quick-links-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Quick Links">
					<i class="icon-menu1"></i>
				</a>
				-->
			</div>
			<div class="header-items">
				<!-- Custom search start -->
				<div class="custom-search">
					<input type="text" class="search-query" placeholder="Buscar ...">
					<i class="icon-search1"></i>
				</div>
				<!-- Custom search end -->

				<!-- Header actions start -->
				<ul class="header-actions">
					
					<li class="dropdown">
						<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
							<i class="icon-bell"></i>
							<span class="count-label">2</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
							<div class="dropdown-menu-header">
								Notificaciones (40)
							</div>
							<ul class="header-notifications">
								<li>
									<a href="#">
										<div class="user-img away">
											<img src="assets/img/user21.png" alt="User" />
										</div>
										<div class="details">
											<div class="user-title">Abbott</div>
											<div class="noti-details">Membership has been ended.</div>
											<div class="noti-date">Oct 20, 07:30 pm</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user-img busy">
											<img src="assets/img/user10.png" alt="User" />
										</div>
										<div class="details">
											<div class="user-title">Braxten</div>
											<div class="noti-details">Approved new design.</div>
											<div class="noti-date">Oct 10, 12:00 am</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="user-img online">
											<img src="assets/img/user6.png" alt="User" />
										</div>
										<div class="details">
											<div class="user-title">Larkyn</div>
											<div class="noti-details">Check out every table in detail.</div>
											<div class="noti-date">Oct 15, 04:00 pm</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="dropdown">
						<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<span class="user-name">Usuario Nombre</span>
							<span class="avatar">UN<span class="status busy"></span></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
							<div class="header-profile-actions">
								<div class="header-user-profile">
									<div class="header-user">
										<img src="assets/img/user.png" alt="Admin Template" />
									</div>
									<h5>Usuario Nombre</h5>
									<p>Sector</p>
								</div>
								<a href="user-profile.html"><i class="icon-user1"></i> Perfil</a>
								<a href="account-settings.html"><i class="icon-settings1"></i> Opciones</a>
								<a href="./libs/logout.php"><i class="icon-log-out1"></i> Cerrar Sesion</a>
							</div>
						</div>
					</li>
					
				</ul>						
				<!-- Header actions end -->
			</div>
		</header>
		<!-- Header end -->

		<!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->

		

		<!-- Quick settings start -->
		<div class="quick-settings-box">
			<div class="quick-settings-header">
				<div class="date-container">Today <span class="date" id="today-date"></span></div>
				<a href="#" class="quick-settings-box-close">
					<i class="icon-circle-with-cross"></i>
				</a>
			</div>
			<div class="quick-settings-body">
				<div class="fullHeight">
					<div class="quick-setting-list">
						<h6 class="title">Events</h6>
						<ul class="list-items">
							<li>
								<div class="list-title">Product Launch</div>
								<div class="list-location">10:00 AM</div>
							</li>
							<li>
								<div class="list-title">Team Meeting</div>
								<div class="list-location">01:30 PM</div>
							</li>
							<li>
								<div class="list-title">Q&A Session</div>
								<div class="list-location">02:30 PM</div>
							</li>
						</ul>
					</div>
					<div class="quick-setting-list">
						<h6 class="title">Notes</h6>
						<ul class="list-items">
							<li>
								<div class="list-title">Refreshing the list</div>
								<div class="list-location">03:15 PM</div>
							</li>
							<li>
								<div class="list-title">Not able to click on button</div>
								<div class="list-location">03:18 PM</div>
							</li>
						</ul>
					</div>
					<div class="quick-setting-list">
						<h6 class="title">Quick Settings</h6>
						<ul class="set-priority-list">
							<li>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" checked id="systemUpdates">
									<label class="custom-control-label" for="systemUpdates">System Updates</label>
								</div>
							</li>
							<li>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="noti">
									<label class="custom-control-label" for="noti">Notifications</label>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Quick settings end -->

		<!-- *************
			************ Header section end *************
		************* -->
<?php }
}
