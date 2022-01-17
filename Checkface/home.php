<?php
  $page_title = 'Inicio';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<style>
.jumbotron img{
  width: 20%;
}
</style>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>Bienvenido! :)</h1>
          <center><img class="imagen-ingreso" src="ingreso.png" alt="imagen-ingreso"></img></center>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
