<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="main_banner main_banner2">
    <img src="<?= IMGURL ?>fondo_4.jpg" alt="">
    <div class="main_banner_content">
    	<?php the_title( '<h1>', '</h1>' ); ?>
        <p><a href="<?= home_url() ?>">HOME</a>/<a href="<?= home_url() ?>">PRODUCTO</a></p>
    </div>
</div>

<!---------------Contenedor de informacion del productos-------------------->
<section class="home_section_1">
    <div class="woowContent1600 home_section_1_content">

        <div class="pure-g">
            <div class="pure-u-1 pure-u-md-1-2 product_multimedia">
                <?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
				do_action( 'woocommerce_before_single_product_summary' );
				?>
            </div>
            <div class="pure-u-1 pure-u-md-1-2 product_info">
            	<?php the_title( '<h3>', '</h3>' ); ?>
            	<?php
            	$status_stock = $product->get_stock_status();
            	if ( $status_stock == 'instock' ) {
            		$htm_status = 'Disponible';
            	}else{
            		$htm_status = 'Agotado';
            	}
            	?>
                <p class="product_stock <?php echo $status_stock;?>"><span><?php echo $htm_status;?></span></p>
                <p class="product_price">
                	<?php
                	$price = number_format( $product->get_price(), 0, ',', '.' );
                	echo '$ '.$price;
                	?>
                </p>
                <?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
        </div> 
    </div>
    <img class="hoja_section1" src="<?= IMGURL ?>hoja_1.png" alt="">
</section>

<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
do_action( 'woocommerce_after_single_product_summary' );
?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
