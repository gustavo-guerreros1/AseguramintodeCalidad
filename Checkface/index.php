<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php?>

<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Checkface-Inicio de sesión</title>
        <link href="logo.png" rel="icon">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="fuentes/estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
        <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
    </head>
    
    <body>

<div class="container-login">

<div class="wrap-login">
     <?php echo display_msg($msg); ?>

     <center><img class="logo" src="logo.png" alt="logo"  width="30%" ></center>
      <form method="post" action="auth.php" class="login-form validate-form"  id="formLogin" action="">

      <span class="login-form-title">Ingreso</span>
        
        <div class="form-group" data-validate = "Usuario incorrecto">
           
              <input type="name" class="input100" name="username" placeholder="Usuario">
              <span class="focus-efecto"></span>
        </div>

        <div class="form-group" data-validate = "Password incorrecto">
          
            <input type="password" name= "password" class="input100" placeholder="Contraseña">
            <span class="focus-efecto"></span>
        </div>
        


        <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                        <a href="ingreso-menú.html"><button type="submit" name="submit" class="login-form-btn" >CONECTAR</button></a>
                    </div>
        </div>
    </form>
</div>
</div>

   
<script src="jquery/jquery-3.3.1.min.js"></script>    
     <script src="bootstrap/js/bootstrap.min.js"></script>    
     <script src="popper/popper.min.js"></script>    
        
     <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    

</body>
</html>
<?php include_once('layouts/footer.php'); ?>
