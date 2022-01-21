<?php $this->extend('templates/admin_templates');?>
	
    <?php $this->section('content');?>

	<?php 
	
		// echo "data response en index:<br><pre>";
		// print_r($lista_usuarios);
		//  exit;
	
	?>

<style>

  body:not(.modal-open){
    padding-right: 0px !important;
  }

</style>

<script type="text/javascript">

  var lenguaje_es  = {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",

          "sZeroRecords": "No existen datos",
          "sEmptyTable": "No existen datos",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      };

  
 
  // var dataUsuarios = '<?php //echo json_encode($lista_usuarios); ?>';
  // var dataPerfiles = '<?php //echo json_encode($perfiles); ?>';
  // var dataEmpresas = '<?php //echo json_encode($empresas); ?>';

  var dataUsuarios = '[{"id_usuario":"1","id_perfil":"1","id_empersa":"1","rut":"11111111","digito":"1","nombres":"administrador","apparterno":"","apmaterno":"","user":"admin","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":null,"user_insert":"1","user_update":null,"nombre_perfil":"administrador","nombre_empresa":"Piazza Di Fiori","nombre_completo":"administrador  ","id_empresa":"1","appaterno":""},{"id_usuario":"2","id_perfil":"2","id_empersa":"1","rut":"22222222","digito":"2","nombres":"Jose","apparterno":"Perez","apmaterno":"Perez","user":"jperez","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":null,"user_insert":"1","user_update":null,"nombre_perfil":"jefe local","nombre_empresa":"Piazza Di Fiori","nombre_completo":"Jose Perez Perez","id_empresa":"1","appaterno":"Perez"},{"id_usuario":"3","id_perfil":"3","id_empersa":"1","rut":"33333333","digito":"3","nombres":"Evelyn","apparterno":"Aguilar","apmaterno":"Aguilar","user":"eaguilar","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":null,"user_insert":"1","user_update":null,"nombre_perfil":"cajero","nombre_empresa":"Piazza Di Fiori","nombre_completo":"Evelyn Aguilar Aguilar","id_empresa":"1","appaterno":"Aguilar"},{"id_usuario":"4","id_perfil":"4","id_empersa":"1","rut":"44444444","digito":"4","nombres":"Rosamel","apparterno":"Fierro","apmaterno":"Delgado","user":"rfierro","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":null,"user_insert":"1","user_update":null,"nombre_perfil":"garz\u00f3n","nombre_empresa":"Piazza Di Fiori","nombre_completo":"Rosamel Fierro Delgado","id_empresa":"1","appaterno":"Fierro"},{"id_usuario":"5","id_perfil":"4","id_empersa":"1","rut":"55555555","digito":"5","nombres":"Debora","apparterno":"Cabezas","apmaterno":"Parada","user":"dcabezas","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":null,"user_insert":"1","user_update":null,"nombre_perfil":"garz\u00f3n","nombre_empresa":"Piazza Di Fiori","nombre_completo":"Debora Cabezas Parada","id_empresa":"1","appaterno":"Cabezas"},{"id_usuario":"6","id_perfil":"4","id_empersa":"1","rut":"66666666","digito":"6","nombres":"Lucho","apparterno":"Pay","apmaterno":"Parada","user":"lpay","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":null,"user_insert":"1","user_update":null,"nombre_perfil":"garz\u00f3n","nombre_empresa":"Piazza Di Fiori","nombre_completo":"Lucho Pay Parada","id_empresa":"1","appaterno":"Pay"},{"id_usuario":"7","id_perfil":"4","id_empersa":"1","rut":"17475555-8","digito":"7","nombres":"Rosa","apparterno":"Meza","apmaterno":"Cabeza","user":"rmeza","password":"21232f297a57a5a743894a0e4a801fc3","estado":"vigente","ts_insert":"2022-01-04 20:09:04","ts_update":"2022-01-16 21:08:11","user_insert":"1","user_update":"1","nombre_perfil":"garz\u00f3n","nombre_empresa":"Piazza Di Fiori","nombre_completo":"Rosa Meza Cabeza","id_empresa":"1","appaterno":"Meza"},{"id_usuario":"8","id_perfil":"1","id_empersa":"1","rut":"jaime","digito":null,"nombres":"jaime","apparterno":"jaime","apmaterno":"jaime","user":"jaime","password":null,"estado":"vigente","ts_insert":"2022-01-16 21:08:25","ts_update":"2022-01-16 21:08:49","user_insert":"2147483647","user_update":"1","nombre_perfil":"administrador","nombre_empresa":"Piazza Di Fiori","nombre_completo":"jaime jaime jaime","id_empresa":"1","appaterno":"jaime"}]';
  var dataPerfiles = '[{"id_perfil":"1","nombre":"administrador","estado":"vigente","ts_insert":"2022-01-04 19:43:16","ts_update":null,"user_insert":"1","user_update":null},{"id_perfil":"2","nombre":"jefe local","estado":"vigente","ts_insert":"2022-01-04 19:43:16","ts_update":null,"user_insert":"1","user_update":null},{"id_perfil":"3","nombre":"cajero","estado":"vigente","ts_insert":"2022-01-04 19:43:16","ts_update":null,"user_insert":"1","user_update":null},{"id_perfil":"4","nombre":"garz\u00f3n","estado":"vigente","ts_insert":"2022-01-04 19:43:16","ts_update":null,"user_insert":"1","user_update":null}]';
  var dataEmpresas = '[{"id_empresa":"1","rut":"11111111","digito":"1","razon_social":"Piazza Di Fiori","giro_comercial":"gastronomia","nombre":"Piazza Di Fiori","direccion":"Independencia 1806B Con calle carrera, Valparaiso 2380358 Chile","web":"www.lapiazza.cl","email":"administracion@piazza.cl","fono1":"(32) 320 4","fono2":"","celular":"","logo":"PiazzaDifioriLogo.jpg","nombre_contacto":"Jose","fono_contacto":"(32) 320 4512","email_contacto":"contacto@p","estado":"vigente","user_insert":"1","user_update":null,"ts_insert":"2022-01-04 19:36:24","ts_update":null}]';


  var dataUsuariosTabla, dataCentroCostoTabla, dataPerfilesTabla, dataEmpresasTabla;
  var manageTable;
  var dtblUsuario;
  var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

    dataUsuariosTabla = jQuery.parseJSON( dataUsuarios );
    dataPerfilesTabla = jQuery.parseJSON( dataPerfiles );
    dataEmpresasTabla = jQuery.parseJSON( dataEmpresas );

  crearDatatables( dataUsuariosTabla );

  $('#addModal').modal({backdrop: 'static', keyboard: false, show: false });

});


// funciones para vista categoria
function crearDatatables( obj ){

  dtblUsuario = $("#tablaUsuarios").dataTable({
            data: obj,
            "dom": '<"pull-left"l><"pull-right"f>tip',
            "dom": '<"btn">frtip',
            "bPaginate": true,
            pageLength: 5,
            // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
            "bFilter": true,
            "aaSorting": [
                [0, 'desc']
            ],
            "bAutoWidth": false,
            // "scrollY": 700,
            "bSort": true,
            // "scrollCollapse": true,
            "aoColumns": [
                {"bSearchable": true, "bVisible": false,"mDataProp": "id_usuario", "sTitle": "ID USUARIO", "sClass": "width-folio-hoja",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "user", "sTitle": "USER", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_completo", "sTitle": "NOMBRE COMPLETO", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "rut", "sTitle": "RUT", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "estado", "sTitle": "ESTADO", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_perfil", "sTitle": "PERFIL", "sClass": "nombre-ruta",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_empresa", "sTitle": "EMPRESA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "opc", "sTitle": "OPC", "sClass": "cv_centro width-opc", 'defaultContent':''},

                {"bSearchable": true, "bVisible": false,"mDataProp": "id_empresa", "sTitle": "ID EMPRESA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "id_perfil", "sTitle": "ID PERFIL", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "nombres", "sTitle": "EMPRESA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "appaterno", "sTitle": "APELLIDO PATERNO", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "apmaterno", "sTitle": "APELLIDO MATERNO", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "digito", "sTitle": "DÍGITO", "sClass": "width-proyecto",'defaultContent':''},

            ],"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull )
            {
                $(nRow).attr('id','usuario_'+aData.id_usuario);
            },
            "language": lenguaje_es,
            "aoColumnDefs": [{
                "aTargets":  "_all" ,
                "fnCreatedCell": function(nTd, sData, oData, iRow, iCol){

                  if(iCol == 7){

                    
                    let opc = "";
                        
                    let id_usuario = oData.id_usuario;
                    opc = '<a title="Ver Usuarios" onclick="abrilModal(\''+id_usuario+'\', 1);" style="cursor:pointer"> <i class="fas fa-eye text-primary"></i> </a>';

                      opc += '<a title="Editar Usuarios" onclick="abrilModal(\''+id_usuario+'\', 2);" style="cursor:pointer"> <i class="fas fa-edit text-primary"></i> </a>';
                   
                      opc += '<a title="Eliminar Usuarios" onclick="abrilModal(\''+id_usuario+'\', 3);" style="cursor:pointer"> <span class="fas fa-trash text-danger"></span> </a>';
                    
                    
                    // console.log( opc );
                    $(nTd).html(opc);
                  } 

                   
                                       
                },
            }],
        });  

        let html = '<div class="pull-left" style="margina:0px; padding:5px;margin-top: -25px;" >'+
                        '<button class="btn btn-primary" data-toggle="modal" onclick="abrilModal( -1, 0 );" style="margin-bottom: -65px;">Agregar Usuarios</button>'+
                        ''+
                   '</div>';

        $("div.btn").html(html);

}

function abrilModal( id_usuario = -1 , modo = 0 ){

  // console.log( "id: ",id_usuario, "modo: ",modo);
  // modo 1 ver usuario
  // modo 2 editar usuario
  // modo 3 eliminar usuario

  $("#addModal").modal('show');
  

  $("#modoModalGlobal").html( modo );
  $("#usuarioModalGlobal").html( id_usuario );

  $("#user_modal").prop( 'disabled', true );
  $("#nombre_usuario_modal").prop( 'disabled', true );
  $("#app_usuario_modal").prop( 'disabled', true );
  $("#apm_usuario_modal").prop( 'disabled', true );
  $("#rut_modal").prop( 'disabled', true );
  $("#estado_usuario_modal").prop( 'disabled', true );
  $("#perfil_modal").prop( 'disabled', true );
  $("#empresa_modal").prop( 'disabled', true );

  $("#btnModalUsuario").prop( 'disabled', true );
  $("#btnModalUsuario").prop( 'hidden', false );
  $("#btnModalUsuario").html( 'Guardar' );

  if( modo == 1 ){
    texto = 'Ver Usuarios';
    $("#btnModalUsuario").prop( 'hidden', true );
  }else if( modo == 2 ){
    texto = 'Editar Usuarios';
    // $("#nombre_usuario_modal").prop( 'disabled', false );
    // $("#centro_costo_modal").prop( 'disabled', false );
    // $("#estado_usuario_modal").prop( 'disabled', false );
    $("#btnModalUsuario").prop( 'disabled', false );

    variable = false;
    $("#user_modal").prop( 'disabled', variable );
    $("#nombre_usuario_modal").prop( 'disabled', variable );
    $("#app_usuario_modal").prop( 'disabled', variable );
    $("#apm_usuario_modal").prop( 'disabled', variable );
    $("#rut_modal").prop( 'disabled', variable );
    $("#estado_usuario_modal").prop( 'disabled', variable );
    $("#perfil_modal").prop( 'disabled', variable );
    $("#empresa_modal").prop( 'disabled', variable );

  }else if( modo == 3 ){
    texto = 'Eliminar Usuarios';
    $("#btnModalUsuario").prop( 'disabled', false );
    $("#btnModalUsuario").html( 'Eliminar' );
  }else if( modo == 0 ){
    texto = 'Crear Usuarios';

    $("#user_modal").val( '' );
    $("#nombre_usuario_modal").val( '' );
    $("#app_usuario_modal").val( '' );
    $("#apm_usuario_modal").val( '' );
    $("#rut_modal").val( '' );
    
    $("#estado_usuario_modal").val( 1 );

    variable = false;
    $("#btnModalUsuario").prop( 'disabled', variable );
    $("#user_modal").prop( 'disabled', variable );
    $("#nombre_usuario_modal").prop( 'disabled', variable );
    $("#app_usuario_modal").prop( 'disabled', variable );
    $("#apm_usuario_modal").prop( 'disabled', variable );
    $("#rut_modal").prop( 'disabled', variable );
    $("#estado_usuario_modal").prop( 'disabled', variable );
    $("#perfil_modal").prop( 'disabled', variable );
    $("#empresa_modal").prop( 'disabled', variable );

  }

  $("#user_modal").focus();

  $("#titulo_modal").html(texto);

  $('#perfil_modal').html('');
  $('#empresa_modal').html('');

  $.each( dataPerfilesTabla,function(){
    var texto = ' <option value="'+this.id_perfil+'">'+this.nombre+'</option> ';
    $('#perfil_modal').append(texto);
  });

  $.each( dataEmpresasTabla,function(){
    var texto = ' <option value="'+this.id_empresa+'">'+this.nombre+'</option> ';
    $('#empresa_modal').append(texto);
  });


  if( modo == 0 ){
    return false;
  }

  var dataUsuarioModal = dtblUsuario.DataTable().row("#usuario_"+id_usuario).data(); 

  //   $("#nombre_usuario_modal").val( dataUsuarioModal.nombre );

    $("#user_modal").val( dataUsuarioModal.user );
    $("#nombre_usuario_modal").val( dataUsuarioModal.nombres );
    $("#app_usuario_modal").val( dataUsuarioModal.apparterno );
    $("#apm_usuario_modal").val( dataUsuarioModal.apmaterno );
    $("#rut_modal").val( dataUsuarioModal.rut );

  if(dataUsuarioModal.estado == 'vigente'){
    $("#estado_usuario_modal").val( 1 );
  }else{
    $("#estado_usuario_modal").val( 2 );
  }
  
  // $("#centro_costo_modal").val( dataUsuarioModal.nombre_centro_costo );
  $("#perfil_modal").val( dataUsuarioModal.id_perfil );
  console.log( dataUsuarioModal );
  $("#empresa_modal").val( dataUsuarioModal.id_empresa );

}

function guardarUsuario(){

  $("#btnModalUsuario").prop( 'disabled', true );

  let modo      = parseInt( $("#modoModalGlobal").html() );
  let id_usuario = parseInt( $("#usuarioModalGlobal").html() );

  let user   = $("#user_modal").val().toLowerCase().trim();
  let nombre = $("#nombre_usuario_modal").val().trim();

  let appaterno = $("#app_usuario_modal").val().trim();
  let apmaterno = $("#apm_usuario_modal").val().trim();
  let rut       = $("#rut_modal").val().trim();

  let estado        = parseInt( $("#estado_usuario_modal").val() );
  let perfil_modal  = parseInt( $("#perfil_modal").val() );
  let empresa_modal = parseInt( $("#empresa_modal").val() );

  if( nombre == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene nombre de Usuarios';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
  }

  if( user == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene User de Usuario';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
  }

  if( appaterno == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene Apellido Paterno de Usuario';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
  }

  if( apmaterno == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene Apellido Materno de Usuario';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
  }

  if( rut == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene Rut de Usuario';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
  }

  if(estado == 1){
    estado = 'vigente';
  }else{
    estado = 'no vigente';
  }

  if( perfil_modal>0 && empresa_modal>0 && estado>0 ){
    titulo = 'titulo';
    mensaje = 'Selecciones estado, perfil, empresa';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
  }


  if( modo == 3){
    titulo = 'titulo';
    estadoMensaje = 'warning';
    mensaje = "Realmente quiere eliminar el Usuarios";

    swal({
      // title: titulo,
      // text: "Your will not be able to recover this imaginary file!",
      type: estadoMensaje,
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Sí, eliminar",
      closeOnConfirm: false,
      width: 450,
      html: mensaje
    }).then(function () {
        ajaxSaveUsuarios( modo, id_usuario, user, nombre, appaterno, apmaterno, rut, estado, perfil_modal, empresa_modal );
    }).catch(swal.noop);

    $("#btnModalUsuario").prop( 'disabled', false );
    return false;
    // return false;
  }

  ajaxSaveUsuarios( modo, id_usuario, user, nombre, appaterno, apmaterno, rut, estado, perfil_modal, empresa_modal );

}

var contadorUsuarios=200;
function ajaxSaveUsuarios( modo, id_usuario, user, nombre, appaterno, apmaterno, rut, estado, perfil_modal, empresa_modal ){
    // ejecutar ajax para guardar, editar, o eliminar

  try{
    $.ajax({
        //async: true, //define si la llamada es sincronica (bloquea la ejecucion del script hasta que termine) o asincronica (continua con la ejecucion del script y en paralelo hace la llamada)
        url: '<?= base_url();?>/usuarios/saveUsuario',
        // headers: {'X-Requested-With': 'XMLHttpRequest'},
        method:'POST', //tipo de envío de los datos					
        data: {
                'modo':modo, 
                'id_usuario':id_usuario,
                'user':user,
                'nombre':nombre,
                'appaterno':appaterno,
                'apmaterno':apmaterno,
                'rut':rut,
                'estado':estado,
                'perfil_modal':perfil_modal,
                'empresa_modal':empresa_modal,
              }, //el objeto que representa los datos a enviar
        dataType:"JSON",					
        beforeSend:function() {
          // se ejecuta antes de realizar el envío. Se puede usar para bloquear el form temporalmente y evitar duplicados, poner animación de "cargando", etc.
        }, 
        success:function(response){ //los resultados vuelven en response (request.responseText);

          $("#btnModalUsuario").prop( 'disabled', false );
          
          mensajeTexto = response.msg;
          titulo = 'titulo';
            mensaje = 'No tiene nombre de producto';
            estado = response.status;

          if( response.status == 'success' ){
            // mensajeSwall( titulo ,mensajeTexto, estado );
          //  $("#addModal").modal('hide');

            // dtblUsuario.fnClearTable();

            // {"bSearchable": true, "bVisible": false,"mDataProp": "id_usuario", "sTitle": "ID USUARIO", "sClass": "width-folio-hoja",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "user", "sTitle": "USER", "sClass": "fecha-inicio",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_completo", "sTitle": "NOMBRE COMPLETO", "sClass": "fecha-inicio",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "rut", "sTitle": "RUT", "sClass": "fecha-inicio",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "estado", "sTitle": "ESTADO", "sClass": "fecha-inicio",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_perfil", "sTitle": "PERFIL", "sClass": "nombre-ruta",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_empresa", "sTitle": "EMPRESA", "sClass": "width-proyecto",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": true,"mDataProp": "opc", "sTitle": "OPC", "sClass": "cv_centro width-opc", 'defaultContent':''},

            //     {"bSearchable": true, "bVisible": false,"mDataProp": "id_empresa", "sTitle": "ID EMPRESA", "sClass": "width-proyecto",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": false,"mDataProp": "id_perfil", "sTitle": "ID PERFIL", "sClass": "width-proyecto",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": false,"mDataProp": "nombres", "sTitle": "EMPRESA", "sClass": "width-proyecto",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": false,"mDataProp": "appaterno", "sTitle": "APELLIDO PATERNO", "sClass": "width-proyecto",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": false,"mDataProp": "apmaterno", "sTitle": "APELLIDO MATERNO", "sClass": "width-proyecto",'defaultContent':''},
            //     {"bSearchable": true, "bVisible": false,"mDataProp": "digito", "sTitle": "DÍGITO", "sClass": "width-proyecto",'defaultContent':''},


            
            dataUsuario = [{
                          'id_usuario':id_usuario,
                          'user':user,
                          'nombre_completo':nombre+' '+appaterno+' '+apmaterno,
                          'appaterno':appaterno,
                          'apmaterno':apmaterno,
                          'rut':rut,
                          'estado':estado,
                          'id_perfil':perfil_modal,
                          'id_empresa':empresa_modal,
                        }];

            // var dataUsuarioModal = dtblUsuario.DataTable().row("#usuario_"+id_usuario).data(); 

            if( modo == 0){

              contadorUsuarios++;
              dataUsuario = [{
                          'id_usuario':contadorUsuarios,
                          'user':user,
                          'nombre_completo':nombre,
                          'appaterno':appaterno,
                          'apmaterno':apmaterno,
                          'rut':rut,
                          'estado':estado,
                          'id_perfil':perfil_modal,
                          'id_empresa':empresa_modal,
                        }];
              dtblUsuario.fnAddData(dataUsuario);

            }else if(modo == 2){

              dataUsuario = [{
                          'id_usuario':id_usuario,
                          'user':user,
                          'nombre_completo':nombre,
                          'appaterno':appaterno,
                          'apmaterno':apmaterno,
                          'rut':rut,
                          'estado':estado,
                          'id_perfil':perfil_modal,
                          'id_empresa':empresa_modal,
                        }];
                        console.log( dataUsuario );
              var row = $('#usuario_' + id_usuario).closest('tr');
              dtblUsuario.fnDeleteRow(row);
              dtblUsuario.fnAddData(dataUsuario);
            }else if( modo == 3 ){

              var row = $('#usuario_' + id_usuario).closest('tr');
              dtblUsuario.fnDeleteRow(row);

            }
           
            
            

            mensajeSwall( titulo ,mensajeTexto, estado );
            $("#addModal").modal('hide');
            // $(location).attr('href','http://localhost/piazzadifiori/');
          }else{
            mensajeSwall( titulo ,mensajeTexto, estado );
          }
          
        },
        error:function(response) {
        }
        
      });

    }catch( e ){
        console.log("error de metodo en login");
    }
}

function mensajeSwall(titulo, mensaje, estado){
    swal({
        // title: titulo,
        type: estado,
        showConfirmButton: true,
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-751 btn-xs1 btn-primary btn-swal-aceptar1',
        confirmButtonText: '<span class="glyphicon glyphicon-ok"></span> Aceptar',
        allowOutsideClick: false, allowEscapeKey: false, allowEnterKey: false, padding: 10,
        width: 300,
        html: mensaje
    }).then(function () {}).catch(swal.noop);
}

// fin funciones vista usuario

</script>
	
	
<!-- modal generico -->
<div class="modal" tabindex="-1" role="dialog" id="addModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modal">Modal title</h5>
        <span id="modoModalGlobal" hidden></span>
        <span id="usuarioModalGlobal" hidden></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div> -->

      <div class="modal-body">

        <div class="form-group">
          <label for="brand_name">User</label>
          <input type="text" class="form-control" id="user_modal" name="category_name" placeholder="Ingresa User" autocomplete="off" style="text-transform:lowercase">
        </div>
        <div class="form-group">
          <label for="brand_name">Nombre</label>
          <input type="text" class="form-control" id="nombre_usuario_modal" name="category_name" placeholder="Ingresa Nombre Usuario" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="brand_name">Apellido Paterno</label>
          <input type="text" class="form-control" id="app_usuario_modal" name="category_name" placeholder="Ingresa Apellido Paterno" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="brand_name">Apellido Materno</label>
          <input type="text" class="form-control" id="apm_usuario_modal" name="category_name" placeholder="Ingresa Apellido Materno" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="brand_name">Rut</label>
          <input type="text" class="form-control" id="rut_modal" name="category_name" placeholder="Ingresa Rut" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="active">Estado</label>
          <select class="form-control" id="estado_usuario_modal">
            <option value="1">Vigente</option>
            <option value="2">No Vigente</option>
          </select>
        </div>

        <div class="form-group">
          <label for="active">Perfil</label>
          <select class="form-control" id="perfil_modal">
            <option value="1">cc1</option>
            <option value="2">cc2</option>
          </select>
        </div>

        <div class="form-group">
          <label for="active">Empresa</label>
          <select class="form-control" id="empresa_modal">
            <option value="1">cc1</option>
            <option value="2">cc2</option>
          </select>
        </div>

      </div>

      <div class="modal-footer">
        <button id="btnModalUsuario" onclick="guardarUsuario()" type="button" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


    <!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Usuarios</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Usuarios</a></li>
								<li class="breadcrumb-item active">Inicio</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

          

          <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Lista de Usuarios</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                </div>

              <div class="col-md-12 col-xs-12">
                <div class="card-body table-responsive p-0">
                  <table id="tablaUsuarios" class="datatables table table-striped table-valign-middle"></table>
                </div>
              </div>		
          </div>

				</div><!-- /.container-fluid -->
  </section>
			<!-- /.content -->   
  <!-- /.content-wrapper -->

<?php $this->endSection();?>

