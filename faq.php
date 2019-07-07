<!DOCTYPE html>
<?php
// Definimos variable para hacer dinamico el title e incluimos el head
  $pageTitle = "Preguntas Frecuentes";
  require_once 'partials/head.php';
 ?>

<html lang="es" dir="ltr">

  <body>
    <!-- Incluimos la barra de navegacion -->
<?php
  require_once 'partials/header-navbar.php';
?>

<section>
  <div class="container">
    <h2> Centro de Ayuda </h2>
    <div class="buscador">
      <input type="text" name="buscador" id="buscador" placeholder="Buscar.." value="">
    </div>
    <hr>
    <h2>Preguntas Frecuentes</h2>
    <hr>
    <div class="container-preguntas">
<!--    *******************  TABS  *******************    -->
        <div class="tabs">
        <input name="tabs" type="radio" id="tab-general" checked="checked" class="pestana"/>
        <label for="tab-general" class="label">General</label>
        <div class="panel">
        <h1>General</h1>
        <p>The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus × sinensis in the family Rutaceae</p>
        <p>General General General e Citrus × sinensis is considered a sweet orange, whereas the fruit of the Citrus × aurantium is considered a bitter orange. The sweet orange reproduces asexually (apomixis through nucellar embryony); varieties of sweet orange arise through mutations.</p>
        </div>

        <input name="tabs" type="radio" id="tab-compras" class="pestana"/>
        <label for="tab-compras" class="label">Compras</label>
        <div class="panel">
        <h1>Compras</h1>
        <p>The tangerine (Citrus tangerina) is an orange-colored citrus fruit that is closely related to, or possibly a type of, mandarin orange (Citrus reticulata).</p>
        <p>Compras Compras Compras ed for fruit coming from Tangier, Morocco, described as a mandarin variety. Under the Tanaka classification system, Citrus tangerina is considered a separate species.</p>
        </div>

        <input name="tabs" type="radio" id="tab-pagos" class="pestana"/>
        <label for="tab-pagos" class="label">Pagos</label>
        <div class="panel">
        <h1>Pagos</h1>
        <p>Pagos Pagos Pagostina) is a hybrid between a mandarin orange and a sweet orange, so named in 1902. The exterior is a deep orange colour with a smooth, glossy appearance. Clementines can be separated into 7 to 14 segments. Similarly to tangerines, they tend to be easy to peel.</p>
        </div>

        <input name="tabs" type="radio" id="tab-envios" class="pestana"/>
        <label for="tab-envios" class="label">Envios</label>
        <div class="panel">
        <h1>Envios</h1>
        <p>Envios Envios Esncios is a hybrid between a mandarin orange and a sweet orange, so named in 1902. The exterior is a deep orange colour with a smooth, glossy appearance. Clementines can be separated into 7 to 14 segments. Similarly to tangerines, they tend to be easy to peel.</p>
        </div>
        </div>
        <!--    *******************  /TABS  *******************    -->
    </div>

  </div>
</section>
<hr>
<!-- Incluimos el footer -->
<?php
  require_once 'partials/footer.php';
?>

  </body>
</html>
