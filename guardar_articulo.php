<?php
	
	require 'conexion.php';
	
	$idseccion = $_POST['idseccion'];
	$articulo= $_POST['articulo'];
	$titulo = $_POST['titulo'];
	$definicion= $_POST['definicion'];
	
	
	$sql = "INSERT INTO articulo(IdSeccion, Articulo, Titulo, Definicion) VALUES ('$idseccion', '$articulo', '$titulo', '$definicion')";
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
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="nuevo_artículo.php?id=<?php echo $idseccion; ?>" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>