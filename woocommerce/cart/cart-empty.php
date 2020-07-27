<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

?>
<main class="woowContentFull main main_contacto">
    <div class="main_banner main_banner2">
        <img src="<?= IMGURL ?>fondo_6.jpg" alt="">
        <div class="main_banner_content">
            <h1>CARRITO DE COMPRA</h1>
        </div>
    </div>

    <section class="home_section_1">
    	<div class="woowContent1600 home_section_1_content">
    		<div class="pure-g section_2_recetas">
    			<div class="pure-u-1">
    				<div class="section_2_recetas_items">
    					<h4>OOPS! TU CARRITO ESTA VACIO.</h4>
    					<br>
    					<h4>ESCOGE TU MEJOR ELECCIÓN EN ALIMENTOS 100% NATURALES</h4>
    				</div>
    			</div>
    			<div class="pure-u-1 link_all_productos">
    				<p><a href="<?= home_url( 'tienda' ); ?>">VER TODOS LOS PRODUCTOS</a></p>
    			</div>
    		</div>
    	</div>
    </section>

</main>
