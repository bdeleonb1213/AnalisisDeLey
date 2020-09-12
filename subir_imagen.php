<?php 

function insertaImagen(){
    if(empty($_FILES[$tipo_imagen]["name"]))
        return;

    $file_name = $_FILES[$tipo_imagen]["name"];
    $extension = pathinfo($_FILES[$tipo_imagen]["name"], PATHINFO_EXTENSION);
    $ext_formatos = array('png','gif','jpg','jpeg','pfd');

    if(!in_array(strtolower($extension), $ext_formatos))
        return;
    
    $dia = date("d");
    $mes = date("m");
    $anio = date("y");

    $targetDir = "img/$anio/$mes/$dia";

    @rmdir($targetDir);

    if(!file_exists($targetDir)){
        @mkdir($targetDir,077,true)
    }

    $token = md5(uniqid(rand(), true));
    $file_name = $token.'.'.$extension;

    $add = $targetDir.$file_name;
    $db_url_img = "$anio/$mes/$dia/$file_name";

    if(move_uploaded_file($_FILES[$tipo_imagen["tmp_name"],$add])){
        $sql = "UPDATE articulo SET $tipo_imagen = '$db_url_img' WHERE IdArticulo = $IdArticulo";
        $conf ->actualizacion($sql);

    }

}

?>