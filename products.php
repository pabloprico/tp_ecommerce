<!DOCTYPE html>
<?php
// Definimos variable para hacer dinamico el title e incluimos el head
  $pageTitle = "Productos";
  require_once 'partials/head.php';

<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">
    <link rel="stylesheet" href="css/style.css">
    <title>Productos</title>
  </head>
  <body>
    <!-- Incluimos la barra de navegacion -->
  <?php
  require_once 'partials/header-navbar.php';
  ?>
  <hr>
  <!-- Incluimos el footer -->
  <?php
  require_once 'partials/footer.php';
  ?>
  </body>
</html>
