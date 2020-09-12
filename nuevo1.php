<?php

	require 'conexion.php';
    session_start();

   if (!isset($_SESSION['idusuario'])) {
       header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['idlogin'];

    $query = "SELECT IdLey, NombreLey FROM ley ORDER BY NombreLey";
	$resultado=$mysqli->query($query);

?>
<html lang="es">
	<head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proyecto</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>		

        <script language="javascript">
			$(document).ready(function(){
				$("#cbx_ley").change(function () {

					$('#cbx_des').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_ley option:selected").each(function () {
						id_estado = $(this).val();
						$.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_articulo").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_articulo").change(function () {
					$("#cbx_articulo option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
							$("#cbx_des").html(data);
						});            
					});
				})
			});
		</script>
	</head>
	
	<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="ingreso_leyes.php">Cumplimiento de Articulos</a>

            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
                    </div>
                </li>
            </ul>
        </nav>
		<div class="container">
			<div class="container">
				<h3 style="text-align:center">Registro de Cumplimiento</h3>
			</div>
			<br><br>
			<form class="form-horizontal" method="POST" action="guarda.php" enctype="multipart/form-data" autocomplete="off">
                
                <div class="form-group">
					<label for="seleccionar_ley" class="col-sm-2 control-label">Seleccione Ley</label>
					<div class="col-sm-10">
                        <select class="form-control" name="cbx_ley" id="cbx_ley">
				            <option value="0">Seleccionar ley</option>
				            <?php while($row = $resultado->fetch_assoc()) { ?>
					        <option value="<?php echo $row['IdLey']; ?>"><?php echo $row['NombreLey']; ?></option>
				            <?php } ?>
			            </select>
					</div>
				</div>
				
                <div class="form-group">
					<label for="seleccionar_articulos" class="col-sm-2 control-label">Seleccione Articulo</label>
					<div class="col-sm-10">
                    <select class="form-control" name="cbx_articulo" id="cbx_articulo"></select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="des" class="col-sm-2 control-label">Descripción</label>
					<div class="col-sm-10">
                    <select class="form-control" name="cbx_des" id="cbx_des"></select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="hijos" class="col-sm-2 control-label">¿Cumple?</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="Cumple"> SI
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="hijos" name="hijos" value="No Cumple"> NO
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Evidencia</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="archivo" name="archivo">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="mostrar_leyes.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>