<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

	<!---------------Contenedor de productos relacionados-------------------->
    <section class="home_section_1">
        <div class="woowContent1600 home_section_2_content">
            <h3 class="title_product_relact">PRODUCTOS RELACIONADOS</h3>
            <div class="pure-g section_2_recetas">
            	<?php foreach ( $upsells as $upsell ) : ?>

					<?php
					$productClas = wc_get_product( $upsell->get_id() );
					$image = $productClas->get_image_id();
		            $image_url = wp_get_attachment_image_url( $image, '500x273' );
		            $price = number_format( $productClas->get_price(), 0, ',', '.' );
					?>
					<div class="pure-u-1 pure-u-md-1-4">
						<div class="section_2_recetas_items">
	                        <a href="<?php echo $productClas->get_permalink();?>" class="recetas_items_img">
	                            <img src="<?php echo $image_url;?>" alt="">
	                            <span>$ <?php echo $price;?></span>
	                        </a>
	                        <h4><a href="<?php echo $productClas->get_permalink();?>"><?php echo $productClas->get_name();?></a></h4>
	                        <p><?php echo $productClas->get_short_description();?></p>
	                        <p class="section_2_recetas_items_link"><a href="<?php echo $productClas->add_to_cart_url();?>">AGREGAR AL CARRITO</a></p>
	                    </div>
	                </div>
				<?php endforeach; ?>
            </div>
        </div>
        <img class="hoja_section2" src="<?= IMGURL ?>hoja_3.png" alt="">
    </section>
	<?php
endif;

wp_reset_postdata();
