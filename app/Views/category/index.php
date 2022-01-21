<?php $this->extend('templates/admin_templates');?>
	
    <?php $this->section('content');?>

	<?php 
	
		// echo "data response en index:<br><pre>";
		// print_r($lista_categorias);
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

  var dataCategorias = '<?php echo json_encode($lista_categorias); ?>';
  var dataCentroCosto = '<?php echo json_encode($lista_centro_costo); ?>';
  var dataCategoriasTabla, dataCentroCostoTabla;

  var manageTable;
  var base_url = "<?php echo base_url(); ?>";


$(document).ready(function() {

	dataCategoriasTabla  = jQuery.parseJSON( dataCategorias );
  dataCentroCostoTabla = jQuery.parseJSON( dataCentroCosto );

  crearDatatables( dataCategoriasTabla );

  $('#addModal').modal({backdrop: 'static', keyboard: false, show: false });

});

var dtblCategoria;

// funciones para vista categoria
function crearDatatables( obj ){

  dtblCategoria = $("#tablaCategorias").dataTable({
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
                {"bSearchable": true, "bVisible": false,"mDataProp": "id_categoria", "sWidth":"120px","sTitle": "ID CATEGORIA", "sClass": "",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre", "sTitle": "NOMBRE", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "estado",  "sWidth":"80px","sTitle": "ESTADO", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_centro_costo", "sTitle": "CENTRO COSTO", "sClass": "nombre-ruta",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "estado_centro_costo",  "sWidth":"80px","sTitle": "ESTADO CC", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "opc", "sTitle": "OPC", "sWidth":"60px","sClass": "cv_centro width-opc", 'defaultContent':''}

            ],"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull )
            {
                $(nRow).attr('id','categoria_'+aData.id_categoria);
            },
            "language": lenguaje_es,
            "aoColumnDefs": [{
                "aTargets":  "_all" ,
                "fnCreatedCell": function(nTd, sData, oData, iRow, iCol){

                  if(iCol == 2){
                        let dataMostrar;
                        dataMostrar ="No Vigente";
                        if( sData == 'vigente' ){
                            dataMostrar ="Vigente";
                        }
                        
                        $(nTd).html(dataMostrar);
                    }

                    
                  if(iCol == 4){
                        let dataMostrar;
                        dataMostrar ="No Vigente";
                        if( sData == 'vigente' ){
                            dataMostrar ="Vigente";
                        }
                        
                        $(nTd).html(dataMostrar);
                    }


                  if(iCol == 5){

                    
                    let opc = "";
                        
                    let id_categoria = oData.id_categoria;
                    //let servicio = oData.nombre_servicio;  
                    
                    // <a href="#" class="text-muted">
                    //     <i class="fas fa-search"></i>
                    //   </a>

                    opc = '<a title="Ver Categoría" onclick="abrilModal(\''+id_categoria+'\', 1);" style="cursor:pointer"> <i class="fas fa-eye text-primary"></i> </a>';

                      opc += '<a title="Editar Categoría" onclick="abrilModal(\''+id_categoria+'\', 2);" style="cursor:pointer"> <i class="fas fa-edit text-primary"></i> </a>';
                   
                      opc += '<a title="Eliminar Categoría" onclick="abrilModal(\''+id_categoria+'\', 3);" style="cursor:pointer"> <span class="fas fa-trash text-danger"></span> </a>';
                    
                    
                    // console.log( opc );
                    $(nTd).html(opc);
                  } 

                    // if(sData != null && sData != ''){

                        // if(iCol == 1){
                        //     if(sData.length > 16)
                        //     {
                        //         let dataMostrar = sData;
                        //         dataMostrar ="<span title='" + sData + "'>" + sData.substring(0,16) + "</span>";
                        //         $(nTd).html(dataMostrar);
                        //     }
                        // }

                        // if(iCol == 2){
                        //     if(sData.length > 16)
                        //     {
                        //         let dataMostrar = sData;
                        //         dataMostrar ="<span title='" + sData + "'>" + sData.substring(0,16) + "</span>";
                        //         $(nTd).html(dataMostrar);
                        //     }
                        // }

                        // if(iCol == 3){
                        //     let dataMostrar = sData;
                        //     if(sData.length > 25)
                        //     {
                        //         dataMostrar ="<span title='" + sData + "'>" + sData.substring(0,25)+'...' + "</span>";
                        //     }
                        //     $(nTd).html(dataMostrar);
                        // }

                    //     if(iCol == 5){
                    //         let dataMostrar = sData;
                    //         dataMostrar ="<span title='" + oData['servicio_descripcion'] + "'>" + sData + "</span>";
                    //         $(nTd).html(dataMostrar);
                    //     }

                    //     if(iCol == 6){
                    //         let dataMostrar = sData;
                    //         if(sData.length > 12)
                    //         {
                    //             dataMostrar ="<span title='" + oData['cliente'] + "'>" + sData.substring(0,12)+'...'+ "</span>";
                    //         }
                    //         $(nTd).html(dataMostrar);
                    //     }
                    //     if(iCol == 9){
                    //         let dataMostrar = sData;
                    //         if(sData.length > 10)
                    //         {
                    //             dataMostrar ="<span title='" +sData + "'>" +sData.substring(0,10)+'...' + "</span>";
                    //         }
                    //         $(nTd).html(dataMostrar);
                    //     }
                    // }

                                       
                },
            }],
        });  

        // <div class="row">
        //     <div class="col-md-12 col-xs-12">
        //       <button class="btn btn-primary" data-toggle="modal" onclick="abrilModal( -1, 0 );">Agregar Categoría</button>
        //       <br /> <br />
        //     </div>
        // </div>

        let html = '<div class="pull-left" style="margina:0px; padding:5px;margin-top: -25px;" >'+
                        '<button class="btn btn-primary" data-toggle="modal" onclick="abrilModal( -1, 0 );" style="margin-bottom: -65px;">Agregar Categoría</button>'+
                        ''+
                   '</div>';

        $("div.btn").html(html);

}

function abrilModal( id_categoria = -1 , modo = 0 ){

  // console.log( "id: ",id_categoria, "modo: ",modo);
  // modo 1 ver categoria
  // modo 2 editar categoria
  // modo 3 eliminar categoria

  $("#addModal").modal('show');

  $("#modoModalGlobal").html( modo );
  $("#categoriaModalGlobal").html( id_categoria );

  $("#nombre_categoria_modal").prop( 'disabled', true );
  $("#centro_costo_modal").prop( 'disabled', true );
  $("#estado_categoria_modal").prop( 'disabled', true );
  $("#btnModalCategoria").prop( 'disabled', true );
  $("#btnModalCategoria").prop( 'hidden', false );
  $("#btnModalCategoria").html( 'Guardar' );

  if( modo == 1 ){
    texto = 'Ver Categoría';
    $("#btnModalCategoria").prop( 'hidden', true );
  }else if( modo == 2 ){
    texto = 'Editar Categoría';
    $("#nombre_categoria_modal").prop( 'disabled', false );
    $("#centro_costo_modal").prop( 'disabled', false );
    $("#estado_categoria_modal").prop( 'disabled', false );
    $("#btnModalCategoria").prop( 'disabled', false );
  }else if( modo == 3 ){
    texto = 'Eliminar Categoría';
    $("#btnModalCategoria").prop( 'disabled', false );
    $("#btnModalCategoria").html( 'Eliminar' );
  }else if( modo == 0 ){
    texto = 'Crear Categoría';
    $("#nombre_categoria_modal").val( '' );
    $("#estado_categoria_modal").val( 1 );
    $("#nombre_categoria_modal").prop( 'disabled', false );
    $("#centro_costo_modal").prop( 'disabled', false );
    $("#estado_categoria_modal").prop( 'disabled', false );
    $("#btnModalCategoria").prop( 'disabled', false );
  }

  $("#nombre_categoria_modal").focus();

  $("#titulo_modal").html(texto);

  $('#centro_costo_modal').html('');

  $.each( dataCentroCostoTabla,function(){
    var texto = ' <option value="'+this.id_centro_costo+'">'+this.nombre+'</option> ';
    $('#centro_costo_modal').append(texto);
  });

  if( modo == 0 ){
    return false;
  }

  var dataCategoriaModal = dtblCategoria.DataTable().row("#categoria_"+id_categoria).data(); 

  $("#nombre_categoria_modal").val( dataCategoriaModal.nombre );

  if(dataCategoriaModal.estado == 'vigente'){
    $("#estado_categoria_modal").val( 1 );
  }else{
    $("#estado_categoria_modal").val( 2 );
  }
  
  // $("#centro_costo_modal").val( dataCategoriaModal.nombre_centro_costo );
  $("#centro_costo_modal").val( dataCategoriaModal.id_centro_costo );

}

function guardarCategoria(){
  
  $("#btnModalCategoria").prop( 'disabled', true );

  let modo      = parseInt( $("#modoModalGlobal").html() );
  let categoria = parseInt( $("#categoriaModalGlobal").html() );

  // console.log('modo: ',modo, ' categoria: ',categoria);

  let idCC   = parseInt( $("#centro_costo_modal").val().trim() );
  let nombre = $("#nombre_categoria_modal").val().trim();
  let estado = parseInt( $("#estado_categoria_modal").val().trim() );

  if( nombre == '' ){
    titulo = 'titulo';
    mensaje = 'Ingrese nombre de categoría';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalCategoria").prop( 'disabled', false );
    return false;
  }

  if(estado == 1){
    estado = 'vigente';
  }else{
    estado = 'no vigente';
  }

  if( modo == 3){
    titulo = 'titulo';
    estadoMensaje = 'warning';
    mensaje = "Realmente quiere eliminar la Categoría";

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
        ajaxSaveCategoria( modo, categoria, idCC, nombre, estado );
    }).catch(swal.noop);

    ("#btnModalUsuario").prop( 'disabled', true );
    return false;
    // return false;
  }

  ajaxSaveCategoria( modo, categoria, idCC, nombre, estado );

}

function ajaxSaveCategoria( modo, categoria, idCC, nombre, estado ){
     // ejecutar ajax para guardar, editar, o eliminar
  try{
    $.ajax({
        //async: true, //define si la llamada es sincronica (bloquea la ejecucion del script hasta que termine) o asincronica (continua con la ejecucion del script y en paralelo hace la llamada)
        url: '<?= base_url();?>/category/saveCategory',
        method:'POST', //tipo de envío de los datos					
        data: {
                'modo':modo, 
                'id_categoria':categoria,
                'id_centro_costo':idCC,
                'nombre':nombre,
                'estado':estado,
              }, //el objeto que representa los datos a enviar
        dataType:"JSON",					
        beforeSend:function() {
          // se ejecuta antes de realizar el envío. Se puede usar para bloquear el form temporalmente y evitar duplicados, poner animación de "cargando", etc.
        }, 
        success:function(response){ //los resultados vuelven en response (request.responseText);

          $("#btnModalCategoria").prop( 'disabled', false );
          
            mensajeTexto = response.msg;
            titulo = 'titulo';
            mensaje = 'No tiene nombre de producto';
            estado = response.status;

          if( response.status == 'success' ){
            dtblCategoria.fnClearTable();
            dtblCategoria.fnAddData(response.data);
            mensajeSwall( titulo ,mensajeTexto, estado );
            $("#addModal").modal('hide');
            
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

// fin funciones vista categoria

</script>
	
<!-- modal generico -->
<div class="modal" tabindex="-1" role="dialog" id="addModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modal">Modal title</h5>
        <span id="modoModalGlobal" hidden></span>
        <span id="categoriaModalGlobal" hidden></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div> -->

      <div class="modal-body">

        <div class="form-group">
          <label for="brand_name">Nombre Categoría</label>
          <input type="text" class="form-control" id="nombre_categoria_modal" name="category_name" placeholder="Ingresa Categoría" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="active">Estado</label>
          <select class="form-control" id="estado_categoria_modal">
            <option value="1">Vigente</option>
            <option value="2">No Vigente</option>
          </select>
        </div>

        <div class="form-group">
          <label for="active">Centro Costo</label>
          <select class="form-control" id="centro_costo_modal">
            <option value="1">cc1</option>
            <option value="2">cc2</option>
          </select>
        </div>

      </div>

      <div class="modal-footer">
        <button id="btnModalCategoria" onclick="guardarCategoria()" type="button" class="btn btn-primary">Guardar</button>
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
							<h1 class="m-0">Categorías</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Categoría</a></li>
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
                  <h3 class="card-title">Lista de Categorías</h3>
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
                  <table id="tablaCategorias" class="datatables table table-striped table-valign-middle"></table>
                </div>
              </div>		
          </div>

				</div><!-- /.container-fluid -->
  </section>
			<!-- /.content -->   
  <!-- /.content-wrapper -->

<?php $this->endSection();?>

