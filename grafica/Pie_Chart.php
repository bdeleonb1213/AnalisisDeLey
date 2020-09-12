<?php 
require_once "php/conexion.php";
$conexion = conexion();
$sql = "SELECT Articulo,  estado FROM cumplimiento_articulo INNER JOIN articulo ON cumplimiento_articulo.id_articulo = articulo.IdArticulo INNER JOIN ley on cumplimiento_articulo.id_ley = ley.IdLey WHERE IdLey = 6";
		$result = mysqli_query($conexion,$sql);

$valoresY = array();
$valoresX = array();

while ($ver = mysqli_fetch_row($result)) {
		$valoresY[] = $ver[1]; //monto
		$valoresX[] = $ver[0]; //fecha
	}

	$datosX = json_encode($valoresX);
	$datosY = json_encode($valoresY);
	?>
<div id="graficaPie"></div>


<script type="text/javascript">

	var data = [{
		values: [19, 26, 55],
		labels: ['Residential', 'Non-Residential', 'Utility'],
		type: 'pie'
	}];

	var layout = {
		height: 400,
		width: 500
	};

	Plotly.newPlot('grafiaPie', data, layout);



</script>