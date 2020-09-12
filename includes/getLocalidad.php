<?php
	require ('../conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT Titulo FROM articulo WHERE IdArticulo = '$id_municipio'";
	$resultado=$mysqli->query($query);
	
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['Titulo']."'>".$row['Titulo']."</option>";
	}
	echo $html;
?>