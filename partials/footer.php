<!-- Archivo parcial donde tenemos el footer que luego incluimos en todas las paginas -->

<?php
// Arrays de links para hacer dinamico el footer

$links1 = [
  'faq.php' => "Preguntas",
  'devoluciones.php' => "Devoluciones",
  'contacto.php' => "Contactos"
];

$links2 = [
  'login.php' => "Ingresar",
  'register.php' => "Registro",
  'products.php' => "Ordenes"
];

$links3 = [
  'nosotros.php' => "Nosotros",
  'blog.php' => "Blog",
  'politica.php' => "Politica"
];
 ?>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-newsletter">
      <h3>Suscribite</h3>
      <p>Recibí nuestro newsletter para conocer todas las últimas novedades y ofertas.</p>
      <div class="subscription-form">
        <form class="suscription" action="index.html" method="post">
          <label for="">
            <input type="text" name="" value="" placeholder="Email">
          </label>
          <button type="button" name="button">ENVIAR</button>
        </form>
      </div>
    </div>
  <div class="site-footer">
    <div class="link-list">
      <h5>AYUDA</h5>
      <ul class="links">
      <!-- Recorremos el array y hacemos echo de los links -->
        <?php foreach ($links1 as $url => $text): ?>
          <li><a href="<?=$url;?>"><?=$text?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="link-list">
      <h5>CUENTA</h5>
      <ul class="links">
      <!-- Recorremos el array y hacemos echo de los links -->
        <?php foreach ($links2 as $url => $text): ?>
          <li><a href="<?=$url;?>"><?=$text?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="link-list">
      <h5>EMPRESA</h5>
      <ul class="links">
      <!-- Recorremos el array y hacemos echo de los links -->
        <?php foreach ($links3 as $url => $text): ?>
          <li><a href="<?=$url;?>"><?=$text?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  </div>
  <div class="social-media">
    <a href="#"><img src="imgs/facebook-logo-button.svg" width="30px" height="30px" alt=""></a>
    <a href="#"><img src="imgs/twitter-logo-button.svg" width="30px" height="30px" alt=""></a>
    <a href="#"><img src="imgs/instagram-logo.svg" width="30px" height="30px" alt=""></a>
    <a href="#"><img src="imgs/pinterest-logo.svg" width="30px" height="30px" alt=""></a>
</div>
<hr>
<p>© 2019, Nuestra Marca.<br> Todos los derechos reservados.</p>
</footer>
