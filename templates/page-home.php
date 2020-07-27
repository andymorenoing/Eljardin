<?php

/**
 * Template Name: Home
 *
 * @package WordPress
 */

get_header();

?>
  <main class="woowContentFull main_home">
    <div class="home_slider">
      <!-- Slider -->
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="<?= home_url() ?>"><img src="<?= IMGURL ?>slider/banner_1.jpg" alt=""></a>
          </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>

    <!--Seccion menu home-->
    <div class="home_menu" style="background:#000"> 
      <div class="woowContent1600">
        <div class="home_menu_img">
          <img src="<?= IMGURL ?>menu_1.jpg" alt="">
        </div>
        <ul>
          <li><a href="<?= home_url('home') ?>">HOME</a></li>
          <li>
            <a href="<?= home_url('juguetes') ?>">JUGUETES</a>
              <ul class="home_menu_submenu">
                <li><a href="<?= home_url('') ?>">Dildos</a></li>
                <li><a href="<?= home_url('') ?>">Vibradores</a></li>
                <li><a href="<?= home_url('') ?>">Anal</a></li>
                <li><a href="<?= home_url('') ?>">Lubricantes</a></li>
                <li><a href="<?= home_url('') ?>">Otros</a></li>
              </ul>
          </li>
          <li><a href="<?= home_url('dominic') ?>">DOMINIC</a></li>
          <li><a href="<?= home_url('sin-censura') ?>">SIN CENSURA</a></li>
        </ul>
      </div>
    </div>

    <!--Seccion servicios-->
    <div class="home_services">
      <div class="pure-g woowContent1600">
        <div class="pure-u-1 pure-u-md-1-2  pure-u-lg-1-4">
          <div class="home_services_item">
            <img src="<?= IMGURL ?>service_1.png" alt="">
            <div class="home_services_item_text">
              <h3>Asesoría<br>personalizada.</h3>
              <p>Escríbenos y te guiaremos en el proceso de tu compra.</p>
            </div>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2  pure-u-lg-1-4">
          <div class="home_services_item">
            <img src="<?= IMGURL ?>service_2.png" alt="">
            <div class="home_services_item_text">
              <h3>Pagos<br>Seguros.</h3>
              <p>Escoge el metodo de pago de tu preferencia.</p>
            </div>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2  pure-u-lg-1-4">
          <div class="home_services_item">
            <img src="<?= IMGURL ?>service_3.png" alt="">
            <div class="home_services_item_text">
              <h3>Envíos<br>nacionales.</h3>
              <p>Despachos el mismo día antes de las 4:00pm</p>
            </div>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-2  pure-u-lg-1-4">
          <div class="home_services_item">
            <img src="<?= IMGURL ?>service_4.png" alt="">
            <div class="home_services_item_text">
              <h3>Discreción.</h3>
              <p>Entregas 100% discretas ¡Nadie sabrá lo que has comprado!</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--home novedades-->
    <div class="home_novedad">
      <div class="woowContent1600">
        <h3>NOVEDADES</h3>
        <div class="pure-g">
          <div class="pure-u-1 pure-u-md-1-3">
            <div class="home_novedad_item">
              <img src="<?= IMGURL ?>" alt="">
              <h3>REALISTIC</h3>
              <p>$250.000</p>
              <p><a href="<?= home_url('') ?>"><span>MÁS INFORMACIÓN</span></a></p>
            </div>
          </div>
          <div class="pure-u-1 pure-u-md-1-3">
            <div class="home_novedad_item">
              <img src="<?= IMGURL ?>" alt="">
              <h3>JONNI</h3>
              <p>$250.000</p>
              <p><a href="<?= home_url('') ?>"><span>MÁS INFORMACIÓN</span></a></p>
            </div>
          </div>
          <div class="pure-u-1 pure-u-md-1-3">
            <div class="home_novedad_item">
              <img src="<?= IMGURL ?>" alt="">
              <h3>FOX TAIL PLUG</h3>
              <p>$250.000</p>
              <p><a href="<?= home_url('') ?>"><span>MÁS INFORMACIÓN</span></a></p>
            </div>
          </div>
        </div>
        <p class="home_novedad_buton"><a href="<?= home_url('') ?>"><span>VER PRODUCTOS</span></a></p>
      </div>
    </div>

    <!--home novedades-->
    <div class="woowContent1600 pure-g banner_promociones">
      <div class="pure-u-1 pure-u-md-1-2">
        <img src="<?= IMGURL ?>banner_dominic.jpg" alt="">
      </div>
      <div class="pure-u-1 pure-u-md-1-2">
        <img src="<?= IMGURL ?>banner_picante.jpg" alt="">
      </div>
    </div>

    <!--home titulo aliados-->
    <div class="home_aliados">
      <div class="title_aliados">
        <span class="title_aliados_divider title_aliados_1"></span>
        <h2>ESTUDIOS ALIADOS</h2>
        <span class="title_aliados_divider title_aliados_2"></span>
      </div>
      
      <div class="home_aliados_item">
        <a href="#"><img src="<?= IMGURL ?>aliado_1.jpg" alt=""></a>
      </div>
      <div class="home_aliados_item">
        <a href=""><img src="<?= IMGURL ?>aliado_2.jpg" alt=""></a>
      </div>
    </div>
  </main>

<?php
get_footer();
?>