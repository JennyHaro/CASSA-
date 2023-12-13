<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Membresia</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, residente, fechaInicio, fechaFin, monto, comprobante, estatus FROM membresia";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$datitus=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaMembresia" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                 
                            <tr>
                                <th>Id</th>
                                <th>Residente</th>
                                <th>Fecha Pago</th>                                
                                <th>Vencimiento</th>  
                                <th>Monto</th>
                                <th>Comprobante</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($datitus as $dati) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dati['id'] ?></td>
                                <td><?php echo $dati['residente'] ?></td>
                                <td><?php echo $dati['fechaInicio'] ?></td>
                                <td><?php echo $dati['fechaFin'] ?></td>   
                                <td><?php echo $dati['monto'] ?></td>    
                                <td><?php echo $dati['comprobante'] ?></td>      
                                <td><?php echo $dati['estatus'] ?></td>    
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formMembresia">    
            <div class="modal-body">
                <div class="form-group">
                <label for="residente" class="col-form-label">Residente:</label>
                <input type="text" class="form-control" id="residente">
                </div>
                <div class="form-group">
                <label for="fechaInicio" class="col-form-label">Fecha inicio:</label>
                <input type="date" class="form-control" id="fechaInicio">
                </div>                
                <div class="form-group">
                <label for="fechaFin" class="col-form-label">Fecha fin:</label>
                <input type="date" class="form-control" id="fechaFin">
                </div>                
                <div class="form-group">
                <label for="monto" class="col-form-label">Monto:</label>
                <input type="text" class="form-control" id="monto">
                </div>                
                <div class="form-group">
                <label for="comprobante" class="col-form-label">Comprobante:</label>
                <input type="text" class="form-control" id="comprobante">
                </div>               
                <div class="form-group">
                <label for="estatus" class="col-form-label">Estatus:</label>
                <input type="text" class="form-control" id="estatus">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>