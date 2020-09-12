<!DOCTYPE html>
<html>
<head>

	<title>Gráficos</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html" style="text-align:center">Graficas Ley de La Ley Asignada</a>
						
					</div>


<br>


					<div class="panel panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div id="cargaLineal"></div>
							</div>
							<div class="col-sm-6">
								<div id="cargaPie_Chart"></div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
		$('#Pie_Chart').load('Pie_Chart.php');
	});
</script>



 <div style="text-align:center;">
	
	</div>

	<div class="col-sm-0">

				<a href="../mostrar_reportes.php" class="btn btn-primary">Regresar</a>
			</div>
