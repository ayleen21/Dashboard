<?php
header('Access-Control-Allow-Origin: http://10.29.98.205/wsserver_sm.php');
header('Access-Control-Allow-Headers: *');
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<title>Dashboard SIGT EMCALI</title>

	<script src="./assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="./assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="./assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all"><link rel="stylesheet" href="./assets/css/fonts.min.css" media="all"><script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['./assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assets/css/atlantis.min.css">
	<link rel="stylesheet" href="./assets/css/dashboardCss.css">

	</head>
<body>
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-white-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h1 class="text-dark pb-2 fw-bold">Informacion de Productos</h1>
								<h3 class="text-dark op-7 mb-2">Productos Centro</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height" style="min-width:320px; height:350px; margin: 0 auto">
								<div class="card-body">
									<div class="card-title">Migraciones</div>
									<div class="card-category">Informacion sobre las migraciones realizadas</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Ordenes de migracion</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Migraciones</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Clientes sin migrar</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height" id="productoTotal" style="min-width:320px; height:350px;">
								<div class="card-body">
									<div class="card-title">Total de Productos</div>
									<div class="row">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="text-align: center;">
					<div>
						<h2 class="text-dark pb-2 fw-bold">Visualizar productos</h2>
						<h4 class="text-dark op-7 mb-2">Seleccione una de las siguientes opciones:</h4>
					</div>
				</div>
				<div class="form-group">
					<select class="form-control form-control" id="selectProduct" onclick="showChart();">
						<option selected>--Seleccione una opcion--</option>
						<option>ProductosRedDirecta</option>
						<option>ProductosArmario</option>
						<option>ProductosCentral</option>
					</select> <br>
					<div class="card-header p-0 border-bottom-0">
											<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Diario</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Semanal</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Mensual</a>
												</li>
											</ul>
										</div>
										<div class="card-body">
											<div class="tab-content" id="custom-tabs-four-tabContent">
												<div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
													<label>Seleccione el dia:</label>
													<div class="input-group-append">
													<input id="fecha" class="input-group-text"></input>
													</div>
												</div>
												<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
												<div class="input-group-append">
												<label for="from">Del</label>
												<input type="text" id="from" name="from" class="input-group-text">
													<label for="to">Hasta</label>
												<input type="text" id="to" name="to" class="input-group-text">
												</div>
												</div>
												<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
												<label>Elegir mes:</label>
												<div class="form-group">
						 							<select class="form-control" id="months" style ="width: 120px; ">
													 	<option selected>-Elegir-</option>
  														<option>Enero</option>
  														<option>Febrero</option>
   														<option>Marzo</option>
    													<option>Abril</option>
														<option>Mayo</option>
    													<option>Junio</option>
    													<option>Julio</option>
    													<option>Agosto</option>
    													<option>Septiembre</option>
    													<option>Octubre</option>
    													<option>Noviembre</option>
    													<option>Diciembre</option>
 													</select>
												</div>
											</div>
											</div>
				</div><br>
				<div id="contenedor" onclick="showChart();">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Estadisticas de Productos</div>
									</div>
								</div>
								<div class="card-body">
									<div class="chart-container"  style="min-height: 375px">
										</div>

									</div>
								</div>
							</div>
						</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<strong>Copyright &copy; 2022 <a class="text-danger" href="https://www.emcali.com.co/">EMCALI E.I.C.E. E.S.P. </a></strong><br>
						</nav>
					</div>
			</div>
			</footer>
		</div>
		<!-- jQuery UI -->
		<script src="./assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

		<!-- Chart Circle -->
		<script src="./assets/js/plugin/chart-circle/circles.min.js"></script>

		<!-- Atlantis JS -->
		<script src="./assets/js/atlantis.min.js"></script>

		<!-----------Function Dashboard------>
		<script src="./assets/js/functionDashboard.js"></script>

		<!------------Popper.js -->
		<script src="./assets/js/core/popper.min.js"></script>

		<script src="./assets/js/core/bootstrap.min.js"></script>

		<!--------Highcharts----->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>

		

</body>

</html>