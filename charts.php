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
    $sql = "SELECT * FROM considerandos where IdLey=$id";
    $resultado = $mysqli->query($sql);


?>




<!DOCTYPE html>
<html lang="en">
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
            <a class="navbar-brand" href="ingreso_leyes.php">Reportes</a>

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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 style="text-align:center" > <?php echo $row['NombreLey']; ?></h3>
                        <ol class="breadcrumb mb-4">
                        </ol>
       

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                        
                        
                    </div>


<br>


                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="cargaLineal"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<h1 class="col-sm-offset-5 col-sm-10">Cumplimiento</h1>



<div style="text-align:center;">
    <table border="1" style="margin: 0 auto;">
        <tr>
            <td>NOMBRE LEY </td>
            <td>ARTÍCULO</td>
             <td>TÍTULO</td>
            <td>ESTADO</td>
           
                           
        </tr>

 

        <?php
        require_once "php/conexion.php";
        $conexion = conexion();
    $id = $_GET['id'];
         
 $sql="SELECT NombreLey, Articulo, cumplimiento_articulo.titulo, estado FROM cumplimiento_articulo 
 INNER JOIN articulo ON cumplimiento_articulo.id_articulo = articulo.IdArticulo 
 INNER JOIN ley on cumplimiento_articulo.id_ley = ley.IdLey WHERE IdLey = $id"  ;


    

        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result))

        {
         ?>


        <tr>
            <td><?php echo $mostrar['NombreLey'] ?></td>
            <td><?php echo $mostrar['Articulo'] ?></td>
            <td><?php echo $mostrar['titulo'] ?></td>
            <td><?php echo $mostrar['estado'] ?></td>
            
        </tr>
    <?php 
    }
     ?>
    </table>
    </div>
        <br></br>
            <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                        <a href="mostrar_reportes.php" class="btn btn-primary"target="blank">REGRESAR</a>
                        <a href="reportes/pdf.php?id=<?php echo $id; ?>" class="btn btn-primary"target="blank">GENERAR PDF</a>
                        <a href="grafica/grafica.php?id=<?php echo $id; ?>"  class="btn btn-primary"target="blank">GENERAR GRAFICA</a>
                    </div>
                </div>

                            </div>
                        </div>
                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>







    </body>
</html>




<script type="text/javascript">
    $(document).ready(function(){
        $('#cargaLineal').load('lineal.php');
        $('#cargaBarras').load('barras.php');
    });
</script>

