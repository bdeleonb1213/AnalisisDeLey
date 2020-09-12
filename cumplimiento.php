<?php

	require 'conexion.php';
    session_start();

   if (!isset($_SESSION['idusuario'])) {
       header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['idlogin'];


    	//id de la ley que viene de la otra pagina
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM ley WHERE IdLey = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);


	//para buscar considerandos especificos de la ley seleccionada
	$sql = "SELECT IdArticulo, Articulo, Titulo FROM articulo INNER JOIN seccion ON articulo.IdSeccion = seccion.IdSeccion INNER JOIN capitulo ON capitulo.IdCapitulo = seccion.IdCapitulo INNER JOIN titulo ON titulo.IdTitulo = capitulo.IdTitulo INNER JOIN ley ON ley.IdLey = titulo.IdLey WHERE ley.IdLey = $id";
	$resultado = $mysqli->query($sql);


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
	</head>
	
	<body>
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="ingreso_leyes.php">Agregar Considerando</a>

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

        <br><br>
        <div> </div>
		<div class="container">
			<div class="col-sm-offset-1 col-sm-10">
				<h3 style="text-align:center" > <?php echo $row['NombreLey']; ?></h3>
			</div>
			
		
		</div>

<!-- tabla mostrar considerandos-->

		<div class="container">
			<br>
			<div class="col-sm-offset-1 col-sm-10">
				<h3 style="text-align:center" > Tabla de Cumplimiento </h3>
			</div>		
			<br>	
			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>Articulo</th>
							<th>Nombre</th>
							<th>Cumple</th>
							<th>No Cumple</th>
							<th>Evidencia</th>
							<th>Incisos</th>
						</tr>
					</thead>
					
					<tbody>
                        <?php
                        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['IdArticulo']; ?></td>
								<td><?php echo $row['Articulo']; ?></td>
								<td><?php echo $row['Titulo']; ?></td>
								<td><input type="radio" name="nivel" value="Cumple"></td>
								<td><input type="radio" name="nivel" value="No Cumple"></td>
								<td><input type="file" name="id_archivo" class="file-upload-default" value = "Cargar"></td>
								<td><a href="Cumplimiento_inciso.php?id=<?php echo $row['IdArticulo']; ?>"> Seleccionar</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel"> Eliminar Registro</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	


	</body>
</html>