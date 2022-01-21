<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <base href="<?= base_url();?>"/>
  
  <title>Complejo Deportivo Salud e Imagen</title>
  <!-- Bootstrap core CSS-->
  <link href="public/admin/plantilla/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="public/admin/plantilla/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="public/admin/plantilla/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">
      
        <?php 
        
            /*if ($mensaje){
                echo $mensaje; 
            }else{                           
                echo "Ingrese sus datos de acceso.";					       
            }*/
            if($this->session->flashdata('message'))
		 	{
			     echo $this->session->flashdata('message'); 
            }else{
                echo "Ingrese sus datos de acceso.";
			
			}
        ?>
        
        <!--Login-->
      
      </div>
      <div class="card-body">
        
        <!--<form>-->
        <?php echo form_open('usuarios/login')?>
          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input class="form-control" id="nick" name="nick" type="text" aria-describedby="emailHelp" placeholder="Usuario" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contrase&ntilde;a</label>
            <input class="form-control" id="clave" name="clave" type="password" placeholder="Contraseña" value="">
          </div>
          <!--<div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>-->
          <input type="submit" class="btn btn-primary btn-block" value="Acceder" />
          <!--<a class="btn btn-primary btn-block" href="usuarios/login">Ingresar</a>-->
        </form>
        
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="public/admin/plantilla/vendor/jquery/jquery.min.js"></script>
  <script src="public/admin/plantilla/vendor/popper/popper.min.js"></script>
  <script src="public/admin/plantilla/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="public/admin/plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
