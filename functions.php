<?php

/**
 * @Descripcion: function.php
 *
 * Funciones especificas para TORUS Tecnologia
 *
 **/

/*
|---------------------------------------------------------------------------
| Definicio de constantes para el manejo de url absolutas
|---------------------------------------------------------------------------
|
*/
// Constante URL del tema
define('WPURL', get_bloginfo('wpurl'));
define('THEMEURL', get_bloginfo('template_url'));
define('BASEPATH', dirname(__FILE__));

// Constante URL CSS
define('CSSURL', THEMEURL . '/assets/css/');

// Constante URL JS
define('JSURL', THEMEURL . '/assets/js/');

// Constante URL IMG
define('IMGURL', THEMEURL . '/assets/images/');

// Constante version CACHE
define('VCACHE', '1.0.8');

// Constante URL APP
define( 'APPURL', THEMEURL . '/app/' );
define( 'APPPATH', BASEPATH . '/app/' );

// Constante URL APP
define('CLASSURL', APPURL . '/class/');
define('CLASSPATH', APPPATH . '/class/');

/*
|---------------------------------------------------------------------------
| Llamada a funciones
|---------------------------------------------------------------------------
|
*/

$fileFunctions = array(
						'internal-functions.php'
					,	'internal-functions-woocommerce.php'
					,	'ajax-functions.php'
				);

foreach( $fileFunctions as $fileName ){
    require_once ( APPPATH . $fileName );
}

/*
|---------------------------------------------------------------------------
| Llamada a Class
|---------------------------------------------------------------------------
*/

$fileClass = array(
					'class-CustomWoo.php'
			);

foreach ($fileClass as $fileName) {
	require_once(CLASSPATH . $fileName);
}
