<?php/*
	require_once 'func/controller.php';

	if (!isLoged()) {
		header('location: login.php');
		exit;
	}
	$user = $_SESSION['userLoged'];

  echo "<pre>";
  var_dump($_SESSION);
  echo "</pre> <br>";
  echo "<pre>";
  var_dump($_POST);
  echo "</pre> <br>";
  echo "<pre>";
  var_dump($user);
  echo "</pre> <br>";
*/
 ?>

 <?php
 // Definimos variable para hacer dinamico el title e incluimos el head
   $pageTitle = "Pagina de inicio";
   require_once 'partials/head.php';
  ?>
  <html lang="es" dir="ltr">
    
    <body>

      <?php
      require_once 'partials/header-navbar.php';
     ?>
		<h1>Bienvenida/o <?php echo $user['nombre'] ?></h1>
		<p>Tu email es: <a href="mailto:<?= $user['email'] ?>"> <?= $user['email'] ?> </a></p>
    <h2 style="text-align:center; font-size: 40px; font-family:'Lora', serif; margin-top:80px">Mi Cuenta</h2>
		<a style="display: block; text-align:center; text-decoration:none; color: black;" href="logout.php">Salir</a>

    <div id="perfil" style="display:flex; justify-content: space-around; margin-top:120px">

      <div class="perfil-caja" style="margin-bottom: 150px;">
        <a href="#" style="font-family:'Lora'; font-size: 28px;  text-decoration: none; color: black">Historial de Compras</a>
      </div>

      <div class="perfil-caja">
        <a href="#" style="font-family:'Lora'; font-size: 28px; text-decoration: none; color: black">Detalles de la Cuenta</a>
      </div>

    </div>

    <?php
      require_once 'partials/footer.php';
     ?>

    </body>
  </html>
