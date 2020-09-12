<?php
    require 'conexion.php';
    
    session_start();

   if (!isset($_SESSION['idusuario'])) {
       header("Location: index.php");
	}
	
	$id = $_GET['id'];

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['idlogin'];

	$sql = "SELECT NombreLey, Articulo, cumplimiento_articulo.titulo, estado, evidencia FROM cumplimiento_articulo INNER JOIN articulo ON cumplimiento_articulo.id_articulo = articulo.IdArticulo INNER JOIN ley on cumplimiento_articulo.id_ley = ley.IdLey WHERE IdLey = $id";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
            <a class="navbar-brand" href="ingreso_leyes.php">Tabla de Cumplimiento</a>

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
			<br>
			<div class="col-sm-offset-1 col-sm-10">
				<h3 style="text-align:center" > Tabla de Cumplimiento </h3>
			</div>

            <div class="col-sm-0">
				<a href="nuevo1.php" class="btn btn-primary">Nuevo Cumplimiento</a>
			</div>

			<br>	
			<div class="row table-responsive">
				<table class="table table-striped">
				<thead>
						<tr>
							<th>Ley</th>
							<th>Articulo</th>
							<th>Descripcion</th>
							<th>Estado</th>
							<th>Evidencia</th>
                            <th>Incisos</th>
						</tr>
					</thead>
					
					<tbody>
					<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['NombreLey']; ?></td>
								<td><?php echo $row['Articulo']; ?></td>
								<td><?php echo $row['titulo']; ?></td>
								<td><?php echo $row['estado']; ?></td>
								<td><?php echo $row['evidencia']; ?></td>
                                <td><a href="nuevo_subinciso.php?id=<?php echo $row['IdInciso']; ?>"></span> Seleccionar</a></td>
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
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
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