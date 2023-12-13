<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Incidente</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen FROM incidentes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$dattus=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
                        <table id="tablaIncidentes" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                        <div class="mb-3">
</div>
                            <tr>
                                <th>Id</th>
                                <th>Residente</th>
                                <th>Decripción</th>                                
                                <th>Evidencia</th>  
                                <th>Fecha incidente</th>
                                <th>Fecha atención</th>
                                <th>Respuesta</th>
                                <th>Estatus</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dattus as $datu) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $datu['id'] ?></td>
                                <td><?php echo $datu['residente'] ?></td>
                                <td><?php echo $datu['descripcion'] ?></td>
                                <td><?php echo $datu['evidencia'] ?></td>    
                                <td><?php echo $datu['fechaIncidente'] ?></td>      
                                <td><?php echo $datu['fechaAtencion'] ?></td> 
                                <td><?php echo $datu['respuesta'] ?></td>      
                                <td><?php echo $datu['estatus'] ?></td>     
                                <td><?php echo $datu['imagen'] ?></td>  
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
            
<form id="formIncidentes">
<div class="form-group">
<label for="residente" class="form-label">Residente</label>
<input type="text"  id="residente" name="residente" class="form-control" required>
</div>
<div class="form-group">
    <label for="descripcion">Descripcion:</label><br>
    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="">
</div>
<div class="form-group">
      <label for="evidencia" class="form-label">Evidencia</label>
    <input type="text"  id="evidencia" name="evidencia" class="form-control" required>
    
</div>
<div class="form-group">
    <label for="fechaIncidente">fecha incidente:</label><br>
    <input type="date" name="fechaIncidente" id="fechaIncidente" class="form-control" required>
</div>

<div class="form-group">
      <label for="fechaAtencion" class="form-label">Fecha Atención</label>
    <input type="date"  id="fechaAtencion" name="fechaAtencion" class="form-control">
</div>
<div class="form-group">
      <label for="respuesta" class="form-label">Respuesta</label>
    <input type="text"  id="respuesta" name="respuesta" class="form-control">
</div>
<div class="form-group">
      <label for="estatus" class="form-label">Estatus</label>
    <input type="text"  id="estatus" name="estatus" class="form-control">
</div>
<div class="form-group">
      <label for="imagen" class="form-label">Imagen</label>
    <input type="file"  id="imagen" require="">
</div>

<div class="modal-footer">
                <button type="button" class="btn btn-light" dattus-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>

</form>
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>