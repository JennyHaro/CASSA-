<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


$residente = (isset($_POST['residente'])) ? $_POST['residente'] : '';
$amenidad = (isset($_POST['amenidad'])) ? $_POST['amenidad'] : '';
$fechaReserva = (isset($_POST['fechaReserva'])) ? $_POST['fechaReserva'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion1 = (isset($_POST['opcion1'])) ? $_POST['opcion1'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


$visitante = (isset($_POST['visitante'])) ? $_POST['visitante'] : '';
$residente = (isset($_POST['residente'])) ? $_POST['residente'] : '';
$condominio = (isset($_POST['condominio'])) ? $_POST['condominio'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$opcion2 = (isset($_POST['opcion2'])) ? $_POST['opcion2'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

$residente = (isset($_POST['residente'])) ? $_POST['residente'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$evidencia = (isset($_POST['evidencia'])) ? $_POST['evidencia'] : '';
$fechaIncidente = (isset($_POST['fechaIncidente'])) ? $_POST['fechaIncidente'] : '';
$fechaAtencion = (isset($_POST['fechaAtencion'])) ? $_POST['fechaAtencion'] : '';
$respuesta = (isset($_POST['respuesta'])) ? $_POST['respuesta'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';
$opcion3 = (isset($_POST['opcion3'])) ? $_POST['opcion3'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


$residente = (isset($_POST['residente'])) ? $_POST['residente'] : '';
$fechaInicio = (isset($_POST['fechaInicio'])) ? $_POST['fechaInicio'] : '';
$fechaFin = (isset($_POST['fechaFin'])) ? $_POST['fechaFin'] : '';
$monto = (isset($_POST['monto'])) ? $_POST['monto'] : '';
$comprobante = (isset($_POST['comprobante'])) ? $_POST['comprobante'] : '';
$estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : '';
$opcion4 = (isset($_POST['opcion4'])) ? $_POST['opcion4'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO comunicado (nombre, descripcion) VALUES('$nombre', '$descripcion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, nombre, descripcion FROM comunicado ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE comunicado SET nombre='$nombre', descripcion='$descripcion' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, nombre, descripcion FROM comunicado WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM comunicado WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

switch($opcion1){
    case 4: //alta
        $consulta = "INSERT INTO reservacion (residente, amenidad, fechaReserva, estatus) VALUES('$residente', '$amenidad', '$fechaReserva', '$estatus' ) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, residente, amenidad, fechaReserva, estatus FROM reservacion ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE reservacion SET residente='$residente', amenidad='$amenidad', fechaReserva='$fechaReserva', estatus='$estatus' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, residente, amenidad, fechaReserva, estatus FROM reservacion WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM reservacion WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}


switch($opcion2){
    case 1: //alta
        $consulta = "INSERT INTO visitas (visitante, residente, condominio, fecha) VALUES('$visitante', '$residente', '$condominio', '$fecha' ) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, visitante, residente, condominio, fecha FROM visitas ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dattos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE visitas SET visitante='$visitante', residente='$residente', condominio='$condominio', fecha='$fecha' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, visitante, residente, condominio, fecha FROM visitas WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dattos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM visitas WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

switch($opcion3){
    case 1: //alta
        $consulta = "INSERT INTO incidentes (residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen) VALUES ('$residente', '$descripcion', '$evidencia', '$fechaIncidente', '$fechaAtencion', '$respuesta' '$estatus', '$imagen' ) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen FROM incidentes ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dattus=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE incidentes SET residente='$residente', descripcion='$descripcion', evidencia='$evidencia', fechaIncidente='$fechaIncidente', fechaAtencion='$fechaAtencion', respuesta='$respuesta', estatus='$estatus', imagen='$imagen' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen FROM incidentes WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dattus=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM incidentes WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

switch($opcion4){
    case 1: //alta
        $consulta = "INSERT INTO membresia (residente, fechaInicio, fechaFin, monto, comprobante, estatus) VALUES('$residente', '$fechaInicio', '$fechaFin', '$monto', '$comprobante', '$estatus') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, residente, fechaInicio, fechaFin, monto, comprobante, estatus FROM membresia ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datitus=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE membresia SET residente='$residente', fechaInicio='$fechaInicio', fechaFin='$fechaFin', monto='$monto', comprobante='$comprobante' , estatus='$estatus' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, residente, fechaInicio, fechaFin, monto, comprobante, estatus FROM membresia WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datitus=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM membresia WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

