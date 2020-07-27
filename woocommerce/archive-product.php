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
		if ( $catSlug == 'box' ) {
			$printother = true;
		}
	}
}
?>
<main class="woowContentFull main <?php echo( ( $printother ) ? 'main_box' : 'main_productos' );?>">
	<div class="main_banner main_banner2">
		<?php
		if ($printother) {
			?>
			<img src="<?= IMGURL ?>fondo_2.jpg" alt="">
	        <div class="main_banner_content">
	            <h1>NUESTROS BOX</h1>
	        </div>
			<?php
		}else{
			?>
			<img src="<?= IMGURL ?>fondo_3.jpg" alt="">
	        <div class="main_banner_content">
	            <h1>PRODUCTOS</h1>
	        </div>
			<?php
		}
		?>
    </div>

    <section class="home_section_1">
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
        <div class="woowContent1600 home_section_1_content">
        	<?php
			if ($printother) {
				?>
				<h3>LO QUE NECESITAS EN CASA</h3>
	            <div class="pure-g">
	            	<?php
	            	$css_woocommerce = new Woocommerce_Custom;
	          		$queryProduct = $css_woocommerce->printProductosTienda( $catSlug, NULL, NULL, 'category' );

	          		if ( is_array( $queryProduct ) && !empty( $queryProduct ) ) {
	          			foreach ( $queryProduct as $key => $wc_product ) {
	          				//Otro Proceso
				            $image = $wc_product->get_image_id();
				            $image_url = wp_get_attachment_image_url( $image, '400x505' );
				            $price = number_format( $wc_product->get_price(), 0, ',', '.' );
		          			?>
		          			<div class="pure-u-1 pure-u-md-1-2">
			                    <div class="box_items">
			                        <div class="box_items_img">
			                            <img src="<?php echo $image_url;?>" alt="">
			                            <span>$ <?php echo $price;?></span>
			                        </div>
			                        <div class="box_items_text">
			                            <h3><a href="<?php echo $wc_product->get_permalink();?>"><?php echo $wc_product->get_name();?></a></h3>
			                            <?php echo $wc_product->get_description();?>
			                            <p class="section_2_recetas_items_link"><a href="<?php echo $wc_product->add_to_cart_url();?>">AGREGAR AL CARRITO</a></p>
			                        </div>
			                    </div>
			                </div>
		          			<?php
		          		}
	          		}else{
	          			echo '<div class="pure-u-1">';
	          			echo '<div class="box_items">';
	          			echo '<h4>EN EL MOMENTO NO TENEMOS PRODUCTOS DE ESTA CATEGORIA</h4>';
	          			echo '</div>';
	          			echo '</div>';
	          		}

	            	?>
	                
	            </div>
				<?php
			}else{
				?>
				<!--Seccion header de los productos y select con paginacion-->
	            <div class="home_section_2_imgs">
	            	<?php
	            	$taxonomy_images = get_option( 'taxonomy_image_plugin' );
	            	$categoryTienda = get_terms('product_cat', array(
	            													'orderby' => 'ID'
	            												,	'order'   => 'DESC'
	            												,	'parent'  => 0
	            											));

	            	foreach ( $categoryTienda as $key => $taxonomi ) {
	            		$thumbnail_id = get_term_meta( $taxonomi->term_id, 'thumbnail_id', true );
	            		$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	            		$image = $image[0];
	            		echo '<div class="home_section_2_imgs_item">';
	            		echo '<img src="'.$image .'" alt="">';
	            		if ( $taxonomi->name == 'BOX' ) {
	            			echo '<h5><a href="'.get_category_link( $taxonomi->term_id ).'">'.$taxonomi->name.'</a></h5>';
	            		}else{
	            			echo '<h5><a class="tienda_category" data_slugcategory="'.$taxonomi->slug.'">'.$taxonomi->name.'</a></h5>';
	            		}
	            		echo '</div>';
	            	}
	            	?>
	                <div class="productos_count_pagination">
	                    <p>Ver:</p>
	                    <select class="numero_productos">
	                        <option value="8" selected="selected">8</option>
	                        <option value="16">16</option>
	                        <option value="24">24</option>
	                    </select>
	                    <input type="hidden" id="valor_categoria" value="<?php echo( ( $search_type ) ? $findSe : $catSlug );?>">
	                    <input type="hidden" id="data_find" value="<?php echo( ( $search_type ) ? 'search' : 'category' );?>">
	                </div>
	            </div>

	            <?php
	            $css_woocommerce = new Woocommerce_Custom;

	            if ( $search_type ) {
	            	$queryProduct = $css_woocommerce->printProductosTienda( $findSe, 8, 0, 'search' );
	            }else{
	            	$queryProduct = $css_woocommerce->printProductosTienda( $catSlug, 8, 0, 'category' );
	            }
	            ?>

	            <!---------------Contenido de productos ---------------------->
	            <div class="pure-g section_2_recetas">
	            	<?php
	            	if ( is_array( $queryProduct->products ) && !empty( $queryProduct->products ) ) {
	          			foreach ($queryProduct->products as $key => $wc_product) {
	          				//Otro Proceso
				            $image = $wc_product->get_image_id();
				            $image_url = wp_get_attachment_image_url( $image, '500x273' );
				            $price = number_format( $wc_product->get_price(), 0, ',', '.' );
		          			?>
		          			<div class="pure-u-1 pure-u-md-1-4">
			                    <div class="section_2_recetas_items">
			                        <a href="<?php echo $wc_product->get_permalink();?>" class="recetas_items_img">
			                            <img src="<?php echo $image_url;?>" alt="">
			                            <span>$ <?php echo $price;?></span>
			                        </a>
			                        <h4><a href="<?php echo $wc_product->get_permalink();?>"><?php echo $wc_product->get_name();?></a></h4>
			                        <p><?php echo $wc_product->get_short_description();?></p>
			                        <p class="section_2_recetas_items_link"><a href="<?php echo $wc_product->add_to_cart_url();?>">AGREGAR AL CARRITO</a></p>
			                    </div>
			                </div>
		          			<?php
						}					

	          		}else{
	          			echo '<div class="pure-u-1">';
	          			echo '<div class="section_2_recetas_items">';
	          			if ( $search_type ) {
	          				echo '<h4>NO ENCONTRAMOS RESULTADOS RELACIONADOS CON TU BUSQUEDA</h4>';
	          			}else{
	          				echo '<h4>EN EL MOMENTO NO TENEMOS PRODUCTOS DE ESTA CATEGORIA</h4>';
	          			}
	          			echo '</div>';
	          			echo '</div>';
	          		}

	            	?>

	            </div>

	            <!------------------Paginador de los productos ---------------------->
	            <?php
	            if ( is_array( $queryProduct->products ) && !empty( $queryProduct->products ) ) {
	            	if ( $queryProduct->max_num_pages > 1 ) {
						$arrayPage = array(
								'mas_page' 	=> $queryProduct->max_num_pages
							,	'num_productos' => 8
							,	'type' => 'input'
						);
						if ( $search_type ) {
							$arrayPage['find'] = $findSe;
							$arrayPage['type_s'] = 'search';
						}else{
							$arrayPage['find'] = $catSlug;
							$arrayPage['type_s'] = 'category';
			            }
						?>
						<script type="text/javascript">
							var paginationroduct = <?php echo wp_json_encode($arrayPage); ?>;
						</script>

						<div class="content_pagination">
							<div class="sec_pagination">
								<p>Pagina</p>
								<div id="pagination" class="products_pagination"></div>
							</div>
						</div>
	            		<?php
	            	}
	            }
			}
			?>
            
        </div>
        <img class="hoja_section1" src="<?= IMGURL ?>hoja_1.png" alt="">
        <img class="hoja_section2" src="<?= IMGURL ?>hoja_3.png" alt="">
        <?php
        /**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
        ?>
    </section>

</main>
<?php

get_footer( 'shop' );
