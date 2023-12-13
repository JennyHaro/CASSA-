<?php

$conexion=mysqli_connect("localhost","root","","akiapp"); 

if (
    isset($_POST["residente"]) && !empty($_POST["residente"]) &&
    isset($_POST["descripcion"]) && !empty($_POST["descripcion"]) &&
    isset($_POST["evidencia"]) && !empty($_POST["evidencia"])&&
    isset($_POST["fechaIncidente"]) && !empty($_POST["fechaIncidente"])&& 
    isset($_POST["fechaAtencion"]) && !empty($_POST["fechaAtencion"])&& 
    isset($_POST["respuesta"]) && !empty($_POST["respuesta"])&& 
    isset($_POST["estatus"]) && !empty($_POST["estatus"])&& 
    isset($_POST["imagen"]) && !empty($_POST["imagen"]) 
) {

    $residente = $_POST["residente"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
    $rol = $_POST["rol"];


    if (isset($_POST["selImg"]) && !empty($_POST["selImg"])) {
		$imagen = $_POST["selImg"];
	} else {
		$imagen = '';
	}

    $sql = "INSERT INTO incidente (residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen)
    VALUES (?, ?, ?, ?, ?,?)";

    if ($statement = mysqli_prepare($conexion, $sql)) {

        mysqli_stmt_bind_param($statement, "ssssss", $residente, $descripcion, $evidencia, $fechaIncidente, $fechaAtencion, $respuesta, $estatus, $imagen);

        if (mysqli_stmt_execute($statement)) {
      header('Location: ../views/incidente.php');

        } else {
            echo "No se pudo realizar la accion";
        }
        mysqli_stmt_close($statement);
    }

    mysqli_close($conexion);
} else {
?>
<?php  } ?>
