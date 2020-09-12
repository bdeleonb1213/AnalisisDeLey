<?php
	
	require 'conexion.php';
	
	$idsubinciso = $_POST['idsubinciso'];
	$idinciso = $_POST['idinciso'];
	$subinciso = $_POST['subinciso'];
	
	
	$sql = "UPDATE subinciso set IdInciso='$idinciso', Subinciso='$subinciso' where IdSubinciso=$idsubinciso";
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
					<a href="nuevo_subinciso.php?id=<?php echo $idinciso; ?>" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>