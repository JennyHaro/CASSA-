<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Visitas</h1>
    
    
    
 <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consultas = "SELECT id, visitante, residente, condominio, fecha FROM visitas";
$resultadoss = $conexion->prepare($consultas);
$resultadoss->execute();
$dattos=$resultadoss->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" dattos-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaVisitas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Visitante</th>
                                <th>Residente</th> 
                                <th>Tipo</th>                                
                                <th>Fecha</th>                               
                                <th>Acciones</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($dattos as $datas) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $datas['id'] ?></td>
                                <td><?php echo $datas['visitante'] ?></td>
                                <td><?php echo $datas['residente'] ?></td>
                                <td><?php echo $datas['condominio'] ?></td>
                                <td><?php echo $datas['fecha'] ?></td>    
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
                <button type="button" class="close" dattos-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formVisitas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="visitante" class="col-form-label">Visitante:</label>
                <input type="text" class="form-control" id="visitante">
                </div>
                <div class="form-group">
                <label for="residente" class="col-form-label">Residente:</label>
                <input type="text" class="form-control" id="residente">
                </div>                
                <div class="form-group">
                <label for="condominio" class="col-form-label">Tipo:</label>
                <input type="text" class="form-control" id="condominio">
                </div>                
                <div class="form-group">
                <label for="fecha" class="col-form-label">Fecha:</label>
                <input type="datetime-local" class="form-control" id="fecha">
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" dattos-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>