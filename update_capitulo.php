<?php
	
	require 'conexion.php';
	
	$idcapitulo = $_POST['idcapitulo'];
	$idtitulo = $_POST['idtitulo'];
	$nombrecapitulo = $_POST['capitulo'];
	
	
	$sql = "UPDATE capitulo set IdTitulo='$idtitulo', NombreCapitulo='$nombrecapitulo' where IdCapitulo=$idcapitulo";
	//echo $sql;
	$resultado = $mysqli->query($sql);
	mysqli_close($mysqli);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					<a href="nuevo_capitulo.php?id=<?php echo $idtitulo; ?>" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>