<?php
	
	require ('../conexion.php');
	
	$id_estado = $_POST['id_estado'];
	
	$queryM = "SELECT IdArticulo, Articulo, Titulo FROM articulo INNER JOIN seccion ON articulo.IdSeccion = seccion.IdSeccion INNER JOIN capitulo ON capitulo.IdCapitulo = seccion.IdCapitulo INNER JOIN titulo ON titulo.IdTitulo = capitulo.IdTitulo INNER JOIN ley ON ley.IdLey = titulo.IdLey WHERE ley.IdLey = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Articulo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['IdArticulo']."'>".$rowM['Articulo']."</option>";
	}
	
	echo $html;
?>		

