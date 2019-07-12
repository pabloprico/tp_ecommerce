<?php
	require_once 'func/controller.php';

	if (!isLoged()) {
		header('location: login.php');
		exit;
	}
	$user = $_SESSION['userLoged'];




  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "</pre> <br>";
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre> <br>";
  // echo "<pre>";
  // var_dump($user);
  // echo "</pre> <br>";


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
    <h2 id="titulo-perfil">Mi Cuenta</h2>
		<a id= "salir" href="logout.php">Salir</a>

    <div id="perfil">

      <div class="perfil-caja">
        <a href="#">Historial de Compras</a>
      </div>

      <div class="perfil-caja">
        <a href="#">Detalles de la Cuenta</a>
      </div>

    </div>

    <?php
      require_once 'partials/footer.php';
     ?>

    </body>
  </html>
