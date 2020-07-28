<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
            ?>
            <div class="title_productos_relacionados">
                <h2>SIGUIENTE PRODUCTO</h2>
                <span></span>
            </div>
			
		<?php endif; ?>
		
		<?php woocommerce_product_loop_start(); ?>

        <?php foreach ( $related_products as $related_product ) : ?>

        <?php
        
            $product = wc_get_product( $related_product->get_id() );

            if ( $product->get_type() == 'simple' ) {
                if( $product->is_on_sale() ){
                    $saleview = number_format( $product->get_sale_price(), 2, '.', ',' );
                    $priceView = number_format( $product->get_regular_price(), 2, '.', ',' );
                }else{
                    $priceView = number_format( $product->get_regular_price(), 2, '.', ',' );
                }
            }elseif ( $product->get_type() == 'variable' ) {
                if ( $product->is_on_sale() ) {
                    $pricesSale = $product->get_variation_prices( true );
                    $ventaP = min( $pricesSale['sale_price'] );
                    $keysale = array_search( $ventaP, $pricesSale['sale_price'] );
                    $regularP 	= $pricesSale['regular_price'][$keysale];
                    if ( $ventaP >= $regularP  ) {
                        reset( $pricesSale['sale_price'] );
                        while ( list( $clave, $valor ) = each( $pricesSale['sale_price'] ) ) {
                            $regularCheck = $pricesSale['regular_price'][$clave];
                            if ( $valor < $regularCheck ) {
                                $regularP = $regularCheck;
                                $ventaP = $valor;
                                break;
                            }
                        }
                    }
                    $priceView = number_format( $regularP, 2, '.', ',' );
                    $saleview = number_format( $ventaP, 2, '.', ',' );
                }else{
                    $prices = $product->get_variation_prices( true );
                    $min_price     = current( $prices['price'] );
                    $max_price     = end( $prices['price'] );
                    $min_reg_price = current( $prices['regular_price'] );
                    $max_reg_price = end( $prices['regular_price'] );
                    if ( $min_reg_price < $max_reg_price ) {
                        $priceViewVar = number_format( $max_reg_price, 2, '.', ',' );
                        $priceView = number_format( $min_reg_price, 2, '.', ',' );
                    } else {
                        $priceView = number_format( $min_reg_price, 2, '.', ',' );
                    }
                }
            }
            //Verificamos si el producto es nuevo
            $metas_product 	= get_post_meta($producto['id']);
            $productNuevo 	= false;
            if (isset($metas_product['productNuevo'][0])) {
                //obtenemos si el producto nuevo o no
                if($metas_product['productNuevo'][0] == 2){
                    $productNuevo = true;
                }
            }
            

            ?>
            <div class="pure-u-1 pure-u-md-1-5">
				<div class="juguete_item">
					<a href="<?php echo $product->get_permalink();?>">
                        <?= $product->get_image() ?>
					</a>
					<h4><a href="<?php echo $product->get_permalink();?>"><?php echo $product->get_name();?></a></h4>
					<p>$ <?= ($saleview) ? $priceView.' - $ '.$saleview : $priceView ?></p>
					<p class="juguete_item_link"><a href="<?php echo $product->get_permalink();?>"><span>MÁS INFORMACIÓN</span></a></p>
				</div>
			</div>
        <?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
