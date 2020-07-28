<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header('shop');
$current_term = $GLOBALS['wp_query']->get_queried_object();
$printother = false;
$search_type = false;
$catSlug = NULL;

if ( isset( $_GET['post_type'] ) &&  !empty( $_GET['post_type'] ) && isset( $_GET['s'] ) &&  !empty( $_GET['s'] ) ) {
	$findSe = sanitize_text_field($_GET['s']);
	$search_type = true;
} elseif (isset($current_term->taxonomy)) {
	if ($current_term->taxonomy == 'product_cat') {
		$catSlug = $current_term->slug;
	}
}
?>
<main class="woowContentFull main_juguetes">
	
	<?php
    	/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
    ?>
    <div class="woowContent1600 juguetes_content">
        
		<div class="juguetes_filter">
			<div class="juguetes_filter_content">
				<h3>CATEGORÍAS DE PRODUCTOS</h3>
				<p class="juguetes_filter_title">TODOS</p>
				<ul>
					<?php
						if($catSlug != ''){
							?>
							<li><a href="<?= home_url('juguetes'); ?>#product-Dildos">Dildos</a></li>
							<li><a href="<?= home_url('juguetes'); ?>#product-Vibradores">Vibradores</a></li>
							<li><a href="<?= home_url('juguetes'); ?>#product-Anal">Anal</a></li>
							<li><a href="<?= home_url('juguetes'); ?>#product-Lubricantes">Lubricantes</a></li>
							<li><a href="<?= home_url('juguetes'); ?>#product-Otros">Otros</a></li>
							<?php
						}else{
							?>
							<li><a href="#product-Dildos">Dildos</a></li>
							<li><a href="#product-Vibradores">Vibradores</a></li>
							<li><a href="#product-Anal">Anal</a></li>
							<li><a href="#product-Lubricantes">Lubricantes</a></li>
							<li><a href="#product-Otros">Otros</a></li>
							<?php
						}
					?>
				</ul>
				<img src="<?= IMGURL ?>filter_juguetes.jpg" alt="">
			</div>
			<div class="juguetes_filter_content_banner">
				<a href="#"><img src="<?= IMGURL ?>banner_juguetes.png" alt=""></a>
			</div>

		
		</div>
		<div class="juguetes_productos">
			<h1>JUGUETES</h1>
			<?php
				$css_woocommerce = new Woocommerce_Custom;
				//Array de titulos de las categorias
				$titulo_cat = array(
					'Dildos',
					'Vibradores',
					'Anal',
					'Lubricantes',
					'Otros'
				);

				if ( $search_type ) {
					$queryProduct = $css_woocommerce->printProductosTienda( $findSe, -1, 0, 'search' );
					$queryProduct = $queryProduct->products;
				}else{
					if( $catSlug != ''){
						
						$queryProduct = $css_woocommerce->printProductosTienda( $catSlug, -1, 0, 'category' );
						$queryProduct = $queryProduct->products;

					}
				}
			?>
			<?php

				if ( $search_type || $catSlug != '' ) {
					//Valores por defecto
					if ( is_array( $queryProduct ) && !empty( $queryProduct ) ) {

						if($catSlug != ''){
							echo '<div class="pure-u-1 cat_title_juguetes" id="product-'.$catSlug.'">';
							echo '<p>'.$catSlug.'</p>';
							echo '<span></span>';
							echo '</div>';
						}
						
						foreach ($queryProduct as $key => $wc_product) {
							//Otro Proceso
						  $image = $wc_product->get_image_id();
						  $image_url = wp_get_attachment_image_url( $image, 'full' );
						  $price = number_format( $wc_product->get_price(), 0, ',', '.' );
							?>
							<div class="pure-u-1 pure-u-md-1-3">
								<div class="juguete_item">
									<a href="<?php echo $wc_product->get_permalink();?>">
										<img src="<?php echo $image_url;?>" alt="">
									</a>
									<h4><a href="<?php echo $wc_product->get_permalink();?>"><?php echo $wc_product->get_name();?></a></h4>
									<p>$ <?php echo $price;?></p>
									<p class="juguete_item_link"><a href="<?php echo $wc_product->get_permalink();?>"><span>MÁS INFORMACIÓN</span></a></p>
								</div>
							</div>
							<?php
					  }					
  
					}else{
						echo '<div class="pure-u-1">';
					
						if ( $search_type ) {
							echo '<h4>No encontramos conincidencias en tu busqueda</h4>';
						}else{
							echo '<h4>Esta categoría no tiene productos</h4>';
						}
				
						echo '</div>';
					}

				}else{

					foreach ($titulo_cat as $key => $cat) {
						echo '<div class="pure-u-1 cat_title_juguetes" id="product-'.$cat.'">';
						echo '<p>'.$cat.'</p>';
						echo '<span></span>';
						echo '</div>';
						$queryProduct = $css_woocommerce->printProductosTienda( strtolower($cat), -1, 0, 'category' );
						$queryProduct = $queryProduct->products;
					
						if ( is_array( $queryProduct ) && !empty( $queryProduct ) ) {
							foreach ($queryProduct as $key => $wc_product) {
		
								$image = $wc_product->get_image_id();
								$image_url = wp_get_attachment_image_url( $image, 'full' );
								$price = number_format( $wc_product->get_price(), 0, ',', '.' );
								?>
								<div class="pure-u-1 pure-u-md-1-3">
									<div class="juguete_item">
										<a href="<?php echo $wc_product->get_permalink();?>">
											<img src="<?php echo $image_url;?>" alt="">
										</a>
										<h4><a href="<?php echo $wc_product->get_permalink();?>"><?php echo $wc_product->get_name();?></a></h4>
										<p>$ <?php echo $price;?></p>
										<p class="juguete_item_link"><a href="<?php echo $wc_product->get_permalink();?>"><span>MÁS INFORMACIÓN</span></a></p>
									</div>
								</div>
								<?php
							}					
	
						}else{
							echo '<div class="pure-u-1">';
							
							echo '<h4>Esta categoría no tiene productos</h4>';
					
							echo '</div>';
						}
					}
				
				}
				
			?>
		</div>
    </div>
       
    <?php
        /**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
    ?>
</main>
<?php

get_footer( 'shop' );
