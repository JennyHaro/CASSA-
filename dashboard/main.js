$(document).ready(function(){
    tablaComunicado = $("#tablaComunicado").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group2'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>" 
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formComunicado").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(1)').text();
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaComunicado.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formComunicado").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val()); 
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, descripcion:descripcion, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            descripcion = data[0].descripcion;
            if(opcion == 1){tablaComunicado.row.add([id,nombre,descripcion]).draw();}
            else{tablaComunicado.row(fila).data([id,nombre,descripcion]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});

$(document).ready(function(){
    tablaReservacion = $("#tablaReservacion").DataTable({
       "columnDefs":[{                              
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group2'><button class='btn btn-primary btnEditar'>Aceptar</button><button class='btn btn-danger btnBorrar'>Rechazar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formReservacion").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva reservación");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion1 = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    residente = fila.find('td:eq(1)').text();
    amenidad = fila.find('td:eq(2)').text();
    fechaReserva =  parseInt(fila.find('td:eq(3)').text());
    estatus = fila.find('td:eq(4)').text();
    
    $("#residente").val(residente);
    $("#amenidad").val(amenidad);
    $("#fechaReserva").val(fechaReserva);
    $("#estatus").val(estatus);
    opcion1 = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Reservacion");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion1 = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion1:opcion1, id:id},
            success: function(){
                tablaReservacion.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formReservacion").submit(function(e){
    e.preventDefault();    
    residente = $.trim($("#residente").val());
    amenidad = $.trim($("#amenidad").val());
    fechaReserva = $.trim($("#fechaReserva").val());
    estatus = $.trim($("#estatus").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {residente:residente, amenidad:amenidad, fechaReserva:fechaReserva, estatus:estatus, id:id, opcion1:opcion1},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            residente = data[0].residente;
            amenidad = data[0].amenidad;
            fechaReserva = data[0].fechaReserva;
            estatus = data[0].estatus;
            if(opcion1 == 1){tablaReservacion.row.add([id,residente, amenidad,fechaReserva,estatus]).draw();}
            else{tablaReservacion.row(fila).data([id,residente, amenidad,fechaReserva,estatus]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    

$(document).ready(function(){
    tablaVisitas = $("#tablaVisitas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group2'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formVisitas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion2 = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    visitante = fila.find('td:eq(1)').text();
    residente = fila.find('td:eq(1)').text();
    condominio = fila.find('td:eq(2)').text();
    fecha = parseInt(fila.find('td:eq(3)').text());
    
    $("#visitante").val(visitante);
    $("#residente").val(residente);
    $("#condominio").val(condominio);
    $("#fecha").val(fecha);
    opcion2 = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Visitante");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion2 = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion2:opcion2, id:id},
            success: function(){
                tablaVisitas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formVisitas").submit(function(e){
    e.preventDefault();    
    visitante = $.trim($("#visitante").val());
    residente = $.trim($("#residente").val());
    condominio = $.trim($("#condominio").val());
    fecha = $.trim($("#fecha").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {visitante:visitante, residente:residente, condominio:condominio, fecha:fecha, id:id, opcion2:opcion2},
        success: function(data){  
            console.log(dattos);
            id = data[0].id;            
            visitante = data[0].visitante;
            residente = data[0].residente;
            condominio = data[0].condominio;
            fecha = data[0].fecha;
            if(opcion2 == 1){tablaVisitas.row.add([id,visitante,residente,condominio,fecha]).draw();}
            else{tablaVisitas.row(fila).data([id,visitante,residente,condominio,fecha]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});
    

$(document).ready(function(){
    tablaIncidentes = $("#tablaIncidentes").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group2'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formIncidentes").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion3 = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    residente = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    evidencia = fila.find('td:eq(3)').text();
    fechaIncidente = parseInt(fila.find('td:eq(4)').text());
    fechaAtencion = parseInt(fila.find('td:eq(5)').text());
    respuesta = fila.find('td:eq(6)').text();
    estatus = fila.find('td:eq(7)').text();
    imagen = fila.find('td:eq(8)').text();
    
    $("#residente").val(residente);
    $("#descripcion").val(descripcion);
    $("#evidencia").val(evidencia);
    $("#fechaIncidente").val(fechaIncidente);
    $("#fechaAtencion").val(fechaAtencion);
    $("#respuesta").val(respuesta);
    $("#estatus").val(estatus);
    $("#imagen").val(imagen);
    opcion3 = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion3 = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion3:opcion3, id:id},
            success: function(){
                tablaIncidentes.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formIncidentes").submit(function(e){
    e.preventDefault();    
    residente = $.trim($("#residente").val());
    descripcion = $.trim($("#descripcion").val());
    evidencia = $.trim($("#evidencia").val());
    fechaIncidente = $.trim($("#fechaIncidente").val());
    fechaAtencion = $.trim($("#fechaAtencion").val());
    respuesta = $.trim($("#respuesta").val());
    estatus = $.trim($("#estatus").val());    
    imagen = $.trim($("#imagen").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: { residente:residente, descripcion:descripcion, evidencia:evidencia, fechaIncidente:fechaIncidente, fechaAtencion:fechaAtencion , respuesta:respuesta, estatus:estatus, imagen:imagen, id:id, opcion3:opcion3},
        success: function(data){  
            console.log(dattus);
            id = data[0].id;            
            residente = data[0].residente;
            descripcion = data[0].descripcion;
            evidencia = data[0].evidencia;
            fechaInicio = data[0].fechaInicio;
            fechaAtencion = data[0].fechaAtencion;
            respuesta = data[0].respuesta;
            estatus = data[0].estatus;
            imagen = data[0].imagen;
            if(opcion3 == 1){tablaIncidentes.row.add([id, residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen]).draw();}
            else{tablaIncidentes.row(fila).data([id, residente, descripcion, evidencia, fechaIncidente, fechaAtencion, respuesta, estatus, imagen]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});


    

$(document).ready(function(){
    tablaMembresia = $("#tablaMembresia").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group2'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formMembresia").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion4 = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    residente = fila.find('td:eq(1)').text();
    fechaInicio = parseInt(fila.find('td:eq(2)').text());
    fechaFin = parseInt(fila.find('td:eq(3)').text());
    monto = parseInt(fila.find('td:eq(4)').text());
    comprobante = fila.find('td:eq(5)').text();
    estatus = fila.find('td:eq(6)').text();
    
    $("#residente").val(residente);
    $("#fechaInicio").val(fechaInicio);
    $("#fechaFin").val(fechaFin);
    $("#monto").val(monto);
    $("#comprobante").val(comprobante);
    $("#estatus").val(estatus);
    opcion4 = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion4 = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion4:opcion4, id:id},
            success: function(){
                tablaMembresia.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formMembresia").submit(function(e){
    e.preventDefault();
    residente = $.trim($("#residente").val());
    fechaInicio = $.trim($("#fechaInicio").val());
    fechaFin = $.trim($("#fechaFin").val());
    monto = $.trim($("#monto").val());
    comprobante = $.trim($("#comprobante").val());
    estatus = $.trim($("#estatus").val());      
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: { residente:residente, fechaInicio:fechaInicio, fechaFin:fechaFin, monto:monto, comprobante:comprobante, estatus:estatus, id:id, opcion4:opcion4},
        success: function(data){  
            console.log(datitus);
            id = data[0].id;            
            residente = data[0].residente;
            fechaInicio = data[0].fechaInicio;
            fechaFin = data[0].fechaFin;
            monto = data[0].monto;
            comprobante = data[0].comprobante;
            estatus = data[0].estatus;
            if(opcion4 == 1){tablaMembresia.row.add([id, residente, fechaInicio, fechaFin, comprobante, estatus]).draw();}
            else{tablaMembresia.row(fila).data([id, residente, fechaInicio, fechaFin, comprobante, estatus]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});

});



