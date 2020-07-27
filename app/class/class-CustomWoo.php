<?php
/*
 * @Archivo: class-CustomWoo.php
 * @Descripcion: Clase para funciones Personalizadas de woocommerce
 *
 */

// Cargamos wordpress
require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");

class Woocommerce_Custom{

	/*
	|-------------------------------------------------------------------------------
	| Function Productos Home
	|-------------------------------------------------------------------------------
	*/

	public function printProductosHome( $slug_category ){

		$params = array(
				'orderby' => 'date'
			,	'order' => 'ASC'
			,	'type' => 'simple'
			,	'limit' => '3'
			,	'page'  => 0
			,	'paginate' => true
			,	'category' => array( $slug_category )
		);

		$queryProduct = new WC_Product_Query( $params );
		$products = $queryProduct->get_products();

		return $products;

	}

	/*
	|-------------------------------------------------------------------------------
	| Function Productos Tienda
	|-------------------------------------------------------------------------------
	*/

	public function printProductosTienda( $slug_category, $limit = NULL, $page = NULL, $type ){

		if ( is_null( $limit ) && is_null( $page ) ) {

			$params = array(
					'orderby' => 'date'
				,	'order' => 'ASC'
				,	'type' => 'simple'
				,	'paginate' => false
			);

		}else{

			$params = array(
					'orderby' => 'date'
				,	'order' => 'ASC'
				,	'type' => 'simple'
				,	'limit' => $limit
				,	'page' => $page
				,	'paginate' => true
			);

		}

		if ( $type == 'search' ) {
			$params['s'] = $slug_category;
		}else{
			if ( $slug_category != NULL ) {
				$params['category'] = array( $slug_category );
			}
		}

		$queryProduct = new WC_Product_Query( $params );
		$products = $queryProduct->get_products();

		return $products;

	}

}

?>