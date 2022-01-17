<?php
  $page_title = 'Lista de ventas';
  require_once('includes/load.php');
  
   page_require_level(3);
?>

<?php
$sales = find_all_sale();
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>


  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Todas la ventas</span>
          </strong>
          <div class="pull-right">
            <a href="add_sale.php" class="btn btn-primary">Agregar venta</a>
          </div>
        </div>

        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Nombre del producto </th>
                <th class="text-center" style="width: 15%;"> Cantidad</th>
                <th class="text-center" style="width: 15%;"> Total </th>
                <th class="text-center" style="width: 15%;"> Fecha </th>
                <th class="text-center" style="width: 100px;"> Acciones </th>
             </tr>
            </thead>
          <tbody>
              <?php foreach ($sales as $sale):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td><?php echo remove_junk($sale['name']); ?></td>
                <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
                <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
                <td class="text-center"><?php echo $sale['date']; ?></td>
                <td class="text-center">
                    <div class="btn-group">
                      <a href="edit_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-edit"></span>
                      </a>
                      <a href="delete_sale.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    </div>
                </td>
              </tr>
              <?php endforeach;?>
          </tbody>
         </table>
            </div>


            <div class="card">
              <img class="card-img-top" src="holder.js/100x180/" alt="">
              <div class="card-body">
              
              <?php
$cliente = "Luis Cabrera Benito";
$remitente = "Carlos Bustamante";
$web = "https://parzibyte.me/blog";
$mensajePie = "Gracias por su compra";
$numero = 1;
$descuento = 0;
$porcentajeImpuestos = 16;
$productos = [
    [
        "precio" => 3,
        "descripcion" => "Gaseosa Pepsi",
        "cantidad" => 4,
    ],
    [
        "precio" => 2,
        "descripcion" => "Chocolate Sublime Clasico 30g.",
        "cantidad" => 5,
    ],
];

date_default_timezone_set('America/Lima');
$zonahoraria=new DateTime();
$fecha = date("Y-m-d  g:i a");
?>

<?php include_once('layouts/footer.php'); ?>
