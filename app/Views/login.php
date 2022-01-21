<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url();?>/public/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url();?>/public/plugins/summernote/summernote-bs4.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php //echo base_url('auth'); ?>"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio día de trabajo</p>
      <div class="form-group has-feedback">
        <input type="input" class="form-control" name="usuario" id="usuario" placeholder="Usuario" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row1">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!-- <input type="checkbox"> Remember Me -->
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button onclick="login();" id="idLogin" class="btn btn-primary btn-block btn-flat">Aceptar</button>
        </div>
        <!-- /.col -->
      </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>/public/plugins/jquery/jquery.min.js"></script>

<script>

  function login(){

    try{
      let error   = 0;
      let mensajeTexto = '';
      if( $("#usuario").val().trim() == ''  ){
        mensajeTexto+= 'Sin Usuario<br>';
        error++;
      }

      if($("#password").val().trim() == ''){
        mensajeTexto+= 'Sin Contraseña<br>';
        error++;
      }

      if( error > 0 ){
        mensaje( mensajeTexto );
        return false;
      }
      
        let usuario = $("#usuario").val().trim();//'rfierro';
        let clave   = $("#password").val().trim();//'21232f297a57a5a743894a0e4a801fc3';

      $.ajax({
        //async: true, //define si la llamada es sincronica (bloquea la ejecucion del script hasta que termine) o asincronica (continua con la ejecucion del script y en paralelo hace la llamada)
        url: '<?= base_url();?>/auths/getDataUsuario',
        // headers: {'X-Requested-With': 'XMLHttpRequest'},
        method:'POST', //tipo de envío de los datos					
        data: {'usuario':usuario, 'clave':clave}, //el objeto que representa los datos a enviar
        dataType:"JSON",					
        beforeSend:function() {
          $("#idLogin").prop('disabled', true);
          // se ejecuta antes de realizar el envío. Se puede usar para bloquear el form temporalmente y evitar duplicados, poner animación de "cargando", etc.
        }, 
        success:function(response){ //los resultados vuelven en response (request.responseText);

          $("#idLogin").prop('disabled', false);

          if( response.status == 'success' ){
            $(location).attr('href','http://localhost/piazzadifiori/');
          }else{
            mensajeTexto = response.msg;
            mensaje( mensajeTexto );
          }
          
        },
        error:function(response) {
        }
        
      });

    }catch( e ){
        console.log("error de metodo en login");
    }

    

    

    
    }

    function mensaje( mensaje ){

        alert( mensaje);
    }

</script>
</body>
</html>
