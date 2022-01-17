<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Sistema simple de inventario";?>
    </title>
    <title>Checkface-Página de inicio</title>
        <link href="logo.png" rel="icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />

    <style>

#header {
  position: fixed;
  z-index: 99;
  top: 0;
  left: 0;
  background-color: #2a3542;
  width: 100%;
  height: 65px;
  line-height: 65px;
  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
   box-shadow: 0 1px 2px rgba(0,0,0,0.1);
} header > .logo {
    color: #fff;
    text-align: center;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: inline-block;
    width: 250px;
    background-color: #2a3542;
}
  .header-date{
  color: #fff;
  margin-left: 20px;
}
.info-menu{
  height: 60px;
  margin: 0;
  line-height: 60px;
  padding: 0 15px;
}.info-menu li.profile {
  position: relative;
}.profile a.toggle{
  text-decoration: none;
  text-align: center;
  font-size: 14px;
  color: rgba(150, 150, 158, 1.0);
  position: relative;
  padding: 10px 10px 10px 0;
  margin: 0;
  background: #ffffff;
  border-radius: 30px;
}.info-menu li.profile a img{
  width: 30px;
  height: 30px;
}.dropdown-menu{
  margin-top: 4px;
  border-color: #fefefe;
  border-radius: 0;
   box-shadow: 0px 0px 5px rgba(86, 96, 117, 0.15);
  -moz-box-shadow: 0px 0px 5px rgba(86, 96, 117, 0.15);
  -webkit-box-shadow: 0px 0px 5px rgba(86, 96, 117, 0.15);
  }.dropdown-menu li{
    margin: 0;
    padding: 0;
    display: block;
    line-height: 35px;
 }.dropdown-menu li a{
  text-decoration: none;
  display: block;
  font-size: 14px;
  position: relative;
  line-height: 30px;
  width: 100%;
  border-bottom: 1px solid #f4faf9;
}.dropdown-menu li a i{
  margin-right: 5px;
}.dropdown-menu li.last a{
  border-bottom: 0;
}.datepicker{
  text-align: center;
}
.sidebar {
  position: fixed;
  z-index: 10;
  left: 0;
  top: 0;
  padding: 65px 0 0;
  height: 100%;
  width: 250px;
  background: rgb(145,69,244);
  background: linear-gradient(230deg, rgba(145,69,244,1) 0%, rgba(65,84,154,1) 80%);
  border-right: 1px solid #ddd;
  text-align: center;
}.sidebar ul li:hover,.submenu ul li:hover{
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}.sidebar ul{
  list-style: none;
  margin: 0;
  padding: 0;
}.sidebar ul li {
  display: block;
}.sidebar ul li:hover,ul.submenu{
  background-color: #2a3542;
}.sidebar ul li a:hover {
  color: white;
}.sidebar ul li a,ul.submenu li a {
  color: #fff;
  display: block;
  overflow: hidden;
  position: relative;
  white-space: nowrap;
  text-decoration: none;
  text-align: left;
}.sidebar ul li a span,.sidebar ul li i{
  font-size: 14px;
  font-weight: 300;
  letter-spacing: 1.5px;
  text-shadow: 0 1px rgba(0,0,0, 1);
}.sidebar ul li a i{
  color: #fff;
  padding: 15px 22px;
  text-align: center;
}ul.submenu{
  display: none;
  position: relative;
}ul.submenu li a:hover{
  background-color: #006CFF;
}ul.submenu li a {
  padding-left: 45px;
}ul.submenu li:before{
  content: "";
  display: block;
  position: absolute;
  z-index: 1;
  left: 25px;
  top: 0;
  bottom: 0;
  border: 1px dotted #d7d7d7;
  border-width: 0 0 0 1px;
}ul.submenu li a:before{
  content: "";
  display: inline-block;
  position: absolute;
  width: 7px;
  left: 25px;
  top: 18px;
  border-top: 1px dotted #d7d7d7;
}
.img-header {
  width: 2%;
}


    </style>
</head>
  <body>
  <?php  if ($session->isUserLoggedIn(true)): ?>
    <header id="header">
     
      <div class="logo pull-left"> Checkface</div>
      <div class="header-content">
      <div class="header-date pull-left">
        <strong><?php echo date("d/m/Y  g:i a");?></strong>
      </div>
      <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
              <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                  <a href="profile.php?id=<?php echo (int)$user['id'];?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Perfil
                  </a>
              </li>
             <li>
                 <a href="edit_account.php" title="edit account">
                     <i class="glyphicon glyphicon-cog"></i>
                     Configuración
                 </a>
             </li>
             <li class="last">
                 <a href="logout.php">
                     <i class="glyphicon glyphicon-off"></i>
                     Salir
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header>
    <div class="sidebar">
      <?php if($user['user_level'] === '1'): ?>
        <!-- admin menu -->
      <?php include_once('admin_menu.php');?>

      <?php elseif($user['user_level'] === '2'): ?>
        <!-- Special user -->
      <?php include_once('special_menu.php');?>

      <?php elseif($user['user_level'] === '3'): ?>
        <!-- User menu -->
      <?php include_once('user_menu.php');?>

      <?php endif;?>

   </div>
<?php endif;?>

<div class="page">
  <div class="container-fluid">
