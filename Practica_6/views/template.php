<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Reservacion de Hotel</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

	<!-- Percent Circle -->
	<link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

	<!-- Dark Themes -->
	<link rel="stylesheet" href="assets/styles/style-dark.min.css">
</head>

<body>
	<div class="main-menu">
		<header class="header">
			<a href="index.php" class="logo">Hotel</a>
			<button type="button" class="button-close fa fa-times js__menu_close"></button>
			<div class="user">
				<a href="#" class="avatar"><img src="views/multimedia/user-800x800.jpg" alt=""><span class="status online"></span></a>
				<h5 class="name"><?php echo $_SESSION['apellido_sesion']; ?></h5>
				<h5 class="position"><?php echo strtoupper($_SESSION['tipo_sesion']); ?></h5>
				<!-- /.name -->
			</div>
			<!-- /.user -->
		</header>
		<!-- /.header -->
		<div class="content">
			<div class="navigation">
				<h5 class="title">Menú</h5>
				<!-- /.title -->
				<?php
				if ($_SESSION['tipo_sesion'] == 'admin')
					include "modules/navegacion_admin.php";
				else if ($_SESSION['tipo_sesion'] == 'receptionist')
					include "modules/navegacion_recep.php";
				?>
				<!-- /.menu js__accordion -->
			</div>
			<!-- /.navigation -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.main-menu -->

	<div class="fixed-navbar">
		<div class="pull-left">
			<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		</div>
		<!-- /.pull-left -->
		<div class="pull-right">
			<div class="ico-item fa fa-arrows-alt js__full_screen"></div>
			<!-- /.ico-item fa fa-fa-arrows-alt -->
			<a href="session/cerrar_sesion.php" class="ico-item fa fa-power-off"></a>
		</div>
		<!-- /.pull-right -->
	</div>
	<!-- /.fixed-navbar -->

	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">

				<?php
				$mvc = new MvcController();
				$mvc->enlacesPaginasController();
				?>

			</div>
			<!-- /.row -->
			<footer class="footer">
				<div class="pull-left">
					<ul class="list-inline">
						<li>
							Práctica 06<br>
							Tecnología y Aplicaciones Web<br>
							Universidad Politécnica de Victoria
						</li>
					</ul>
				</div>
				<div class="pull-right">
					<ul class="list-inline">
						<li>Héctor Alán De La Fuente Anaya</li>
					</ul>
				</div>
			</footer>
		</div>
		<!-- /.main-content -->
	</div>
	<!--/#wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Percent Circle -->
	<script src="assets/plugin/percircle/js/percircle.js"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="assets/plugin/chart/chartist/chartist.min.js"></script>
	<script src="assets/scripts/chart.chartist.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="assets/plugin/moment/moment.js"></script>
	<script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/scripts/fullcalendar.init.js"></script>

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>

</html>