<?php $this->extend('templates/admin_templates');?>
	
    <?php $this->section('content');?>

	<?php 
	
		// echo "data response en index:<br><pre>";
		// print_r($lista_productos);
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

  var dataProductos = '<?php echo json_encode($lista_productos, JSON_HEX_APOS) ; ?>';
  var dataCategoria = '<?php echo json_encode($lista_categoria, JSON_HEX_APOS); ?>';
  var dataProductosTabla, dataCategoriaTabla;
  var dtblProductos;
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";


$(document).ready(function() {

	dataProductosTabla  = jQuery.parseJSON( dataProductos );
  dataCategoriaTabla = jQuery.parseJSON( dataCategoria );

  crearDatatables( dataProductosTabla );

  $('#addModal').modal({backdrop: 'static', keyboard: false, show: false });

});

// funciones para vista productos
function crearDatatables( obj ){

  dtblProductos = $("#tablaProductos").dataTable({
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
            "bAutoWidth": true,
            // "scrollY": 700,
            "bSort": true,
            // "scrollCollapse": true,
            "aoColumns": [
                {"bSearchable": true, "bVisible": false,"mDataProp": "id_producto", "sTitle": "ID PRODUCTOS", "sClass": "width-folio-hoja",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre", "sTitle": "NOMBRE", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "estado", "sTitle": "ESTADO", "sClass": "fecha-inicio",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "nombre_categoria", "sTitle": "NOMBRE CATEGORÍA", "sClass": "nombre-ruta",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "estado_categoria", "sTitle": "ESTADO CATEGORÍA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "codigo_barra", "sTitle": "CÓDIGO BARRA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "precio_costo", "sTitle": "PRECIO COMPRA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "precio_venta", "sTitle": "PRECIO VENTA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": false,"mDataProp": "precio_venta", "sTitle": "PRECIO IVA", "sClass": "width-proyecto",'defaultContent':''},
                {"bSearchable": true, "bVisible": true,"mDataProp": "opc", "sTitle": "OPC","sWidth":"60px", "sClass": "cv_centro width-opc", 'defaultContent':''}

            ],"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull )
            {
                $(nRow).attr('id','producto_'+aData.id_producto);
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


                  if(iCol == 9){

                    
                    let opc = "";
                        
                    let id_producto = oData.id_producto;

                    opc = '<a title="Ver Categoría" onclick="abrilModal(\''+id_producto+'\', 1);" style="cursor:pointer"> <i class="fas fa-eye text-primary"></i> </a>';
                      opc += '<a title="Editar Categoría" onclick="abrilModal(\''+id_producto+'\', 2);" style="cursor:pointer"> <i class="fas fa-edit text-primary"></i> </a>';
                      opc += '<a title="Eliminar Categoría" onclick="abrilModal(\''+id_producto+'\', 3);" style="cursor:pointer"> <span class="fas fa-trash text-danger"></span> </a>';                    
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
                        '<button class="btn btn-primary" data-toggle="modal" onclick="abrilModal( -1, 0 );" style="margin-bottom: -65px;">Agregar Producto</button>'+
                        ''+
                   '</div>';

        $("div.btn").html(html);

}

function abrilModal( id_producto = -1 , modo = 0 ){

  // console.log( "id: ",id_productoproducto, "modo: ",modo);
  // modo 1 ver producto
  // modo 2 editar producto
  // modo 3 eliminar producto

  $("#addModal").modal('show');

  $("#modoModalGlobal").html( modo );
  $("#productoModalGlobal").html( id_producto );

  $("#nombre_producto_modal").prop( 'disabled', true );
  $("#estado_producto_modal").prop( 'disabled', true );

  $("#nombre_categoria_modal").prop( 'disabled', true );
  $("#descripcion_modal").prop( 'disabled', true );
  $("#codigo_barra_modal").prop( 'disabled', true );
  $("#precio_compra_modal").prop( 'disabled', true );
  $("#precio_venta_modal").prop( 'disabled', true );
  $("#precio_iva_modal").prop( 'disabled', true );

  $("#btnModalProducto").prop( 'disabled', true );

  $("#btnModalProducto").prop( 'hidden', false );
  $("#btnModalProducto").html( 'Guardar' );

  if( modo == 1 ){
    texto = 'Ver Producto';
    $("#btnModalProducto").prop( 'hidden', true );
  }else if( modo == 2 ){
    texto = 'Editar Producto';
    $("#nombre_producto_modal").prop( 'disabled', false );
    $("#estado_producto_modal").prop( 'disabled', false );
    $("#nombre_categoria_modal").prop( 'disabled', false );
    $("#descripcion_modal").prop( 'disabled', false );
    $("#codigo_barra_modal").prop( 'disabled', false );
    $("#precio_compra_modal").prop( 'disabled', false );
    $("#precio_venta_modal").prop( 'disabled', false );
    $("#precio_iva_modal").prop( 'disabled', false );
    $("#btnModalProducto").prop( 'disabled', false );
  }else if( modo == 3 ){
    texto = 'Eliminar Producto';
    $("#btnModalProducto").prop( 'disabled', false );
    $("#btnModalProducto").html( 'Eliminar' );
  }else if( modo == 0 ){
    texto = 'Crear Producto';
    $("#nombre_producto_modal").val( '' );
    $("#descripcion_modal").val( '' );
    $("#codigo_barra_modal").val( '' );
    $("#precio_compra_modal").val( '' );
    $("#precio_venta_modal").val( '' );
    $("#precio_iva_modal").val( '' );

    $("#nombre_producto_modal").val( '' );
    $("#estado_producto_modal").val( 1 );

    $("#nombre_producto_modal").prop( 'disabled', false );
    $("#nombre_categoria_modal").prop( 'disabled', false );
    $("#descripcion_modal").prop( 'disabled', false );
    $("#codigo_barra_modal").prop( 'disabled', false );
    $("#precio_compra_modal").prop( 'disabled', false );
    $("#precio_venta_modal").prop( 'disabled', false );
    $("#precio_iva_modal").prop( 'disabled', false );
    $("#estado_producto_modal").prop( 'disabled', false );
    $("#btnModalProducto").prop( 'disabled', false );
  }

  $("#titulo_modal").html(texto);

  $("#nombre_producto_modal").focus();

  $('#nombre_categoria_modal').html('');
  

  $.each( dataCategoriaTabla,function(){
    var texto = ' <option value="'+this.id_categoria+'">'+this.nombre+'</option> ';
    $('#nombre_categoria_modal').append(texto);
  });

  if( modo == 0 ){
    return false;
  }

  var dataProductosModal = dtblProductos.DataTable().row("#producto_"+id_producto).data(); 

  $("#nombre_producto_modal").val( dataProductosModal.nombre );
  $("#descripcion_modal").val( dataProductosModal.descripcion );
  $("#codigo_barra_modal").val( dataProductosModal.codigo_barra );
  $("#precio_compra_modal").val( dataProductosModal.precio_costo );
  $("#precio_venta_modal").val( dataProductosModal.precio_venta );
  $("#precio_iva_modal").val( dataProductosModal.precio_iva );


  if(dataProductosModal.estado == 'vigente'){
    $("#estado_producto_modal").val( 1 );
  }else{
    $("#estado_producto_modal").val( 2 );
  }
  
  $("#nombre_categoria_modal").val( dataProductosModal.id_categoria );

}

function guardarProducto(){

  $("#btnModalProducto").prop( 'disabled', true );
  
  let modo        = parseInt( $("#modoModalGlobal").html() );
  let id_producto = parseInt( $("#productoModalGlobal").html() );

  let id_categoria = parseInt( $("#nombre_categoria_modal").val().trim() );
  let nombre       = $("#nombre_producto_modal").val().trim();
  let estado       = parseInt( $("#estado_producto_modal").val().trim() );

  let descripcion   = parseInt( $("#descripcion_modal").val().trim() );
  let codigo_barra  = parseInt( $("#codigo_barra_modal").val() );
  let precio_compra = parseInt( $("#precio_compra_modal").val().trim() );
  let precio_venta  = parseInt( $("#precio_venta_modal").val().trim() );
  let precio_iva    = parseInt( $("#precio_iva_modal").val().trim() );

  if( nombre == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene nombre de producto';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalProducto").prop( 'disabled', false );
    return false;
  }

  if( descripcion == '' ){
    titulo = 'titulo';
    mensaje = 'No tiene descripción de producto';
    estado = 'warning';
    mensajeSwall(titulo, mensaje, estado);
    $("#btnModalProducto").prop( 'disabled', false );
    return false;
  }

  if( precio_compra > 0){
  }else{
    precio_compra = 0;
  }

  if( precio_venta > 0){
  }else{
    precio_venta = 0;
  }

  if( precio_iva > 0){
  }else{
    precio_iva = 0;
  }

  if(estado == 1){
    estado = 'vigente';
  }else{
    estado = 'no vigente';
  }

  if( modo == 3){
    titulo = 'titulo';
    estadoMensaje = 'warning';
    mensaje = "Realmente quiere eliminar el Producto";

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
        ajaxSaveProducto( modo, id_producto, id_categoria, nombre, estado, codigo_barra, precio_compra, precio_venta, precio_iva, descripcion );
    }).catch(swal.noop);

    $("#btnModalProducto").prop( 'disabled', false );
    return false;
    // return false;
  }

  ajaxSaveProducto( modo, id_producto, id_categoria, nombre, estado, codigo_barra, precio_compra, precio_venta, precio_iva, descripcion );

}

function ajaxSaveProducto( modo, id_producto, id_categoria, nombre, estado, codigo_barra, precio_compra, precio_venta, precio_iva, descripcion ){
  // ejecutar ajax para guardar, editar, o eliminar
  try{
    $.ajax({
        //async: true, //define si la llamada es sincronica (bloquea la ejecucion del script hasta que termine) o asincronica (continua con la ejecucion del script y en paralelo hace la llamada)
        url: '<?= base_url();?>/productos/saveProducto',
        // headers: {'X-Requested-With': 'XMLHttpRequest'},
        method:'POST', //tipo de envío de los datos					
        data: {
                'modo'         : modo, 
                'id_producto'  : id_producto,
                'id_categoria' : id_categoria,
                'nombre'       : nombre,
                'estado'       : estado,
                'codigo_barra' : codigo_barra,
                'precio_compra': precio_compra,
                'precio_venta' : precio_venta,
                'precio_iva'   : precio_iva,
                'descripcion'  : descripcion
              }, //el objeto que representa los datos a enviar
        dataType:"JSON",					
        beforeSend:function() {
          // se ejecuta antes de realizar el envío. Se puede usar para bloquear el form temporalmente y evitar duplicados, poner animación de "cargando", etc.
        }, 
        success:function(response){ //los resultados vuelven en response (request.responseText);

          $("#btnModalProducto").prop( 'disabled', false );
          
          mensajeTexto = response.msg;
          titulo = 'titulo';
            mensaje = 'No tiene nombre de producto';
            estado = response.status;

          console.log( mensajeTexto ); 
          if( response.status == 'success' ){
            // $("#addModal").modal('hide');
            // mensajeSwall( titulo ,mensajeTexto, estado );

            dtblProductos.fnClearTable();
            dtblProductos.fnAddData(response.data);
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

// fin funciones vista Producto

</script>
	
	
<!-- modal generico -->
<div class="modal" tabindex="-1" role="dialog" id="addModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo_modal">Modal title</h5>
        <span id="modoModalGlobal" hidden></span>
        <span id="productoModalGlobal" hidden></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div> -->

      <div class="modal-body">

        <div class="form-group">
          <label for="brand_name">Nombre Producto</label>
          <input type="text" class="form-control" id="nombre_producto_modal" placeholder="Ingresa Producto" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="active">Estado</label>
          <select class="form-control" id="estado_producto_modal">
            <option value="1">Vigente</option>
            <option value="2">No Vigente</option>
          </select>
        </div>

        <div class="form-group">
          <label for="active">Nombre Categoría</label>
          <select class="form-control" id="nombre_categoria_modal">
            <option value="1">cc1</option>
            <option value="2">cc2</option>
          </select>
        </div>
        <div class="form-group">
          <label for="brand_name">Descripción</label>
          <input type="text" class="form-control" id="descripcion_modal" placeholder="Ingresa Descripción" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="brand_name">Código Barra</label>
          <input type="text" class="form-control" id="codigo_barra_modal" placeholder="Ingresa Código barra" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="brand_name">Precio Compra</label>
          <input type="text" class="form-control" id="precio_compra_modal" placeholder="Ingresa Precio Compra" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="brand_name">Precio Venta</label>
          <input type="text" class="form-control" id="precio_venta_modal" placeholder="Ingresa Precio Venta" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="brand_name">Precio Iva</label>
          <input type="text" class="form-control" id="precio_iva_modal" placeholder="Ingresa Precio Iva" autocomplete="off">
        </div>

      </div>

      <div class="modal-footer">
        <button id="btnModalProducto" onclick="guardarProducto()" type="button" class="btn btn-primary">Guardar</button>
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
							<h1 class="m-0">Productos</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Productos</a></li>
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
                  <h3 class="card-title">Lista de Productos</h3>
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
                  <table id="tablaProductos" class="datatables table table-striped table-valign-middle"></table>
                </div>
              </div>		
          </div>

				</div><!-- /.container-fluid -->
  </section>
			<!-- /.content -->   
  <!-- /.content-wrapper -->

<?php $this->endSection();?>

