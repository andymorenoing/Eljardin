<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_id  = $product->get_image_id();
$image_url          = wp_get_attachment_image_url( $post_thumbnail_id, 'full' );
//Video del poup
$video 	            = get_post_meta($product->get_id(), 'video_product', true);
?>
<div class="home_section_1_video_content">   
    <div class="<?php echo( ( $video != '' ) ? 'woow_popup txt' : 'sin_video' );?>">
        <img src="<?= $image_url ?>" alt="">
        <?php
        if($video != ''){
            ?>
            <i class="icon-play3"></i>
            <div class="popup_content">
                <div class="modal-content content_video">
                    <iframe src="https://www.youtube.com/embed/<?= $video ?>?autoplay=1&mute=1&playlist=<?= $video ?>&controls=1&loop=1" frameborder="0"  allowfullscreen></iframe>    
                </div>
            </div>
            <?php
        }
        ?>
    </div>        
</div>
<?php
do_action( 'woocommerce_product_thumbnails' );
?>
