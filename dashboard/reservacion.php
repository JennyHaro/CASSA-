<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Reservación</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consultar = "SELECT id, residente, amenidad, fechaReserva, estatus FROM reservacion";
$resultados = $conexion->prepare($consultar);
$resultados->execute();
$datos=$resultados->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
              
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaReservacion" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Residente</th>
                                <th>Amenidad</th>                                
                                <th>Fecha Reserva</th>                           
                                <th>Estatus</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($datos as $dato) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dato['id'] ?></td>
                                <td><?php echo $dato['residente'] ?></td>
                                <td><?php echo $dato['amenidad'] ?></td>
                                <td><?php echo $dato['fechaReserva'] ?></td>
                                <td><?php echo $dato['estatus'] ?></td> 
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
                                
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" datos-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formReservacion">    
            <div class="modal-body">
                <div class="form-group">
                <label for="residente" class="col-form-label">Residente:</label>
                <input type="text" class="form-control" id="residente">
                </div>
                <div class="form-group">
                <label for="amenidad" class="col-form-label">Amenidad:</label>
                <input type="text" class="form-control" id="amenidad">
                </div>                
                <div class="form-group">
                <label for="fechaReserva" class="col-form-label">Fecha Reservación:</label>
                <input type="datetime-local" class="form-control" id="fechaReserva">
                </div>               
                <div class="form-group">
                <label for="estatus" class="col-form-label">Estatus:</label>
                <input type="text" class="form-control" id="estatus">
                </div>  
                <div class="modal-footer">
                <button type="button" class="btn btn-light" datos-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>      
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>