<?php
	require 'conexion.php';

session_start();

   if (!isset($_SESSION['idusuario'])) {
       header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['idlogin'];


	//modificar
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuarios WHERE IdUsuario = '$id'";
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
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	            <a class="navbar-brand" href="index.html">MODIFICAR REGISTRO</a>

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
						
			<form class="form-horizontal" method="POST" action="update_usuario.php" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['Nombre']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="idusuario" value="<?php echo $row['IdUsuario']; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Correo Electrónico</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="correo" placeholder="Email" value="<?php echo $row['Correo']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Contraseña</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="contrasena" placeholder="Telefono" value="<?php echo $row['Contrasena']; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="estado_civil" class="col-sm-2 control-label">Tipo de Usuario</label>
					<div class="col-sm-10">
						<select class="form-control" id="tipo" name="tipo">
							<option value="1" <?php if($row['IdLogin']=='1') echo 'selected'; ?>>Administrador</option>
							<option value="2" <?php if($row['IdLogin']=='2') echo 'selected'; ?>>Usuario</option>
						</select>
					</div>
				</div>
					
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-10">
						<a href="usuarios.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>