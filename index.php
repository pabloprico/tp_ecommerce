<!DOCTYPE html>
<?php
// Definimos variable para hacer dinamico el title e incluimos el head
  $pageTitle = "Pagina de inicio";
  require_once 'partials/head.php';
 ?>

<html lang="es" dir="ltr">
  

<body>
<!-- Incluimos la barra de navegacion -->
<?php
  require_once 'partials/header-navbar.php';
 ?>

  <section>
  <div class="container"><!-- Container Principal de seccion-->

        <div class="img-principal"><!-- Imagen portada principal -->
          <a href="#"> <!--Link imagen principal -->
          <img src="img/main-img-mobile.jpg" alt="" class="imagen-principal-mobile">
          <img src="img/main-img-full.jpg" alt="" class="main-img-full"><!--!! vER DE CORREGIR, REALENTIZA CARGA MOBILE-->
          </a><!--/Link imagen principal -->
       </div><!-- /Imagen portada principal -->

      <div class="separador-container"><!-- Container de barra y txt TRENDING 1 -->
        <div class="texto-barra-separadora">
        <span> # Destacados </span>
        </div><!-- /Div de txt de la barra separadora -->
        <hr class="barra-separadora">
        </hr><!-- / Barra separadora -->
      </div><!-- /Container de barra y txt TRENDING 1 -->

      <article class="container-articulo-img"> <!-- Container del primer articulo solo imagen -->
        <a href="#" class="a-lista-destacado-img"> <!--Link articulo destacado -->
        <img src="img/cat1.jpg" alt="" class="img-articulo-destacado1">
        </a><!--/Link articulo destacado -->

        <a href="#" class="a-lista-destacado-img"> <!--Articulos destacados lista de imagenes -->
          <img src="img/articulo-destacado2.jpg" alt="" class="img-articulo-destacado2">
        </a><!--/Articulos destacados lista de imagenes -->
        <a href="#" class="a-lista-destacado-img"> <!--Articulos destacados lista de imagenes -->
          <img src="img/articulo-destacado3.jpg" alt="" class="img-articulo-destacado3">
        </a><!--/Articulos destacados lista de imagenes -->
        <a href="#" class="a-lista-destacado-img"> <!--Articulos destacados lista de imagenes -->
          <img src="img/articulo-destacado4.jpg" alt="" class="img-articulo-destacado4">
        </a><!--/Articulos destacados lista de imagenes -->
        <a href="#" class="a-lista-destacado-img"> <!--Articulos destacados lista de imagenes -->
          <img src="img/articulo-destacado5.jpg" alt="" class="img-articulo-destacado5">
        </a><!--/Articulos destacados lista de imagenes -->
      </article><!-- /Container del primer articulo solo imagen container-articulo-img -->


      <div class="separador-container"><!-- Container de BARRA sola -->
        <div class="texto-barra-separadora">
          <span> # Categorias </span>
        </div><!-- /Div de txt de la barra separadora -->
        <hr class="barra-separadora">
        </hr><!-- / Barra separadora -->
      </div><!-- /Container de BARRA sola -->


      <div class="lista-categorias">
        <article class="container-articulo-categoria cat1"><!-- (primer)Container de categoria de prod. con leer mas -->
          <a href="#Categoria1">
          <strong>Sillones</strong></a>
        </article><!-- /(primer)Container de categoria de prod. con leer mas -->


        <article class="container-articulo-categoria cat2"><!-- (segundo)Container de categoria de prod. con leer mas -->
          <a href="#Categoria2">
          <strong>Sillas</strong></a>
        </article><!-- /(segundo)Container de categoria de prod. con leer mas -->


        <article class="container-articulo-categoria cat3"><!-- (tercer)Container de categoria de prod. con leer mas -->
          <a href="#Categoria3">
          <strong>Mesas</strong></a>
        </article><!-- /(tercer)Container de categoria de prod. con leer mas -->


        <article class="container-articulo-categoria cat4"><!-- (cuarto)Container de categoria de prod. con leer mas -->
          <a href="#Categoria4">
          <strong>Sillones</strong></a>
        </article><!-- /(cuarto)Container de categoria de prod. con leer mas -->
      </div><!-- /LISTA DE CATEGORIAS -->

      <div class="separador-container"><!-- Container de barra y txt INSTAGRAM -->
        <div class="texto-barra-separadora">
        </div><!-- /Div de txt de la barra separadora -->
        <hr class="barra-separadora">
        </hr><!-- / Barra separadora -->
      </div><!-- /Container de barra y txt INSTAGRAM -->

  </div><!-- /Container Principal de seccion-->
  </section>

  <section  class="instagram-feed">
  <!-- Esta seccion se hizo provisoriamente con fotos estaticas, a futuro sera reemplazada por un carousel de fotos linkeadas de instagram -->
      <h4 class="section-header_title">
      <a href="#">#NUESTROINSTAGRAM</a>
      </h4>
      <div class="instagram-photos">
        <img src="imgs/insta-1.jpg" alt="" class="instagram-1">
        <img src="imgs/insta-2.jpg" alt="" class="instagram-2">
        <img src="imgs/insta-3.jpg" alt="" class="instagram-3">
        <img src="imgs/insta-4.jpg" alt="" class="instagram-4">
      </div>
  </section>

<!-- Incluimos el footer -->
<?php
  require_once 'partials/footer.php';
 ?>
</body>
</html>
